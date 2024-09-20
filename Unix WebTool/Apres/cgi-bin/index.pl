#!/home/webadmin/unixWebToolRoot/perl/bin/perl

#use lib qw{/home/webadmin/unixWebToolRoot/cgi-bin/lib};
use lib qw{/home/webadmin/unixWebToolRoot/cgi-bin/lib};
use lib qw{/home/webadmin/.cpan/build/Net-SSH-Perl-1.34/lib};
use lib qw{/home/webadmin/.cpan/build/threads-1.86/lib};
use lib qw{/home/webadmin/.cpan/build/Sys-AlarmCall-1.2};
use lib qw{/home/webadmin/.cpan/build/Math-Pari-2.01080605-02nSXZ};
use threads;
use Net::SSH::Perl;
use CGI;
use Sys::AlarmCall;
use strict;
use warnings;

#use RMS;
#use RMS::Page;
#use Data::Dumper;

#my $page = new RMS::Page({-header => {-title => 'RMS Support Site | Unix Tool'}});
#my $cgi = $page->cgi;

my $cgi = CGI->new();

#print $cgi->header('text/html');

print $cgi->header('text/html'), $cgi->start_html('Webs-OPS1 WebTool '); 

my %servers = ("tvmk8208" => "AppId Layer",
	           "tvmk8209" => "AppId Layer",
	           "tvmk8125" => "AppId Layer",
	           "tvmk8126" => "AppId Layer",
	           "tvmk7992" => "AppId Layer",
	           "tvmk7993" => "AppId Layer",
);

my $content;
if ($cgi->param("command")) {
	$content = $cgi->start_form, $cgi->submit("Back to main page"), $cgi->end_form;
	my $command = $cgi->param("command");
	if ($command =~ m/^rm|[\s,;,\|,\&]rm\s/) {
		$command = "echo \"You can't remove or start/stop anything on this server!\"";
	}
	else {
		$command =~ s/`/\\`/g;
		$command =~ s/"/\\"/g;
		$command =~ s/\$/\\\$/g;
	}
	my @servers = $cgi->param("servers");
	#my $results = RMS::run($command, \@servers); # removed untel new login $page->user->{acf2_id});
	my $results = run($command, \@servers, 120); # removed untel new login $page->user->{acf2_id});
	$content .= $cgi->start_form . "Command:" . $cgi->textfield(-name => 'command', -size => "120") . "&nbsp;" . $cgi->submit('Go'); 
	$cgi->autoEscape(0);
	foreach my $server ($cgi->param("servers")) {
		#my $file = "/tmp/" . $server . "_" . $date . ".tmp";
        my $file = "/tmp/" . $server .  ".tmp";

		$content .= "<div><h3>Server: <b>$server</b></h3>" . $cgi->checkbox("servers", 20, $server, "run again") . 
		      '&nbsp;' . $cgi->submit('Go') . "<br/>\n";
		$content .= "<pre class=\"unix_results\">";
		$content .= filter($results->{$server});
		$content .= $command;
		$content .= "</pre></div><br/><br/>";
	}
	$cgi->autoEscape(1);
	$content .= $cgi->end_form;
} else {
		$content = $cgi->start_form(-name=>'unixtool');
		$content .= "<table>";
		$content .= "<tr colspan=\"2\"><td align=\"right\">Group</td><td>";
		$content .= "<select name=\"group\" onChange=\"mark_selected(this)\">";
		$content .= "<option value=\"\"></option>";
		$content .= "<option value=\"56p_app\">56P APP/JBOSS Servers</option>";
		$content .= "<option value=\"k8s_app\">K8S APP/JBOSS Servers</option>";
		$content .= "</select></tr></td>";
		$content .= "<tr><td align=\"right\">Servers</td><td>";
		$cgi->autoEscape(0);
		foreach my $server (sort {$servers{$a} cmp $servers{$b}} sort(keys %servers) ) {
			my $active = 0;
			$content .= $cgi->checkbox("servers", $active, $server, "<font size=\"+1\"><b>$server</b></font> " . $servers{$server}) . "<br/>";
		}
		$cgi->autoEscape(1);
		#$content .= "</td><td width=\"60px\"></td><td><h2>Quick Useful Command Lines</h2><br>";
		# $content .= 
		 # q{<code>./api_log_filter.pl search=&ltstring_1&gt search=&ltstring_2&gt nosearch=&ltno_search_string&gt [options]<br>
				 # Options:<br>
				 # -lastmin:&ltminutes&gt<br>
				 # -from:&lthour&gt:&ltminute&gt<br>
				 # -to:&lthour&gt:&ltminute&gt<br>
				 # -mask:&ltfilemask&gt default:"/logs/rhs/production/apps/RHSplss20*-apilog.log<br><br>
				 # ./premiere_log_filter.pl search=&ltstring_1&gt search=&ltstring_2&gt nosearch=&ltno_search_string&gt [options]<br>
                                 # Options:<br>
                                     # -lastmin:&ltminutes&gt<br>
                                     # -from:&lthour&gt:&ltminute&gt<br>
                                     # -to:&lthour&gt:&ltminute&gt<br>
                                     # -date:&ltYYYY-MM-DD&gt<br>
                                     # -mask:&ltfilemask&gt default:"/logs/rhs/production/apps/RHSplss20*-apilog.log<br><br>
				 # /home/mvb4382/getOvmTimeoutRequest.ksh &ltAPI&gt [OPTIONS]<br> 
				 # API: [ SERVICE_VALIDATION_REQUEST | PLANS_REQUEST | OPTIONS_REQUEST ]<br>
				 # OPTIONS:<br>
				      # -f hh24:mi[:ss]   (this is the start or "from" date.)<br>
				      # -t hh24:mi[:ss]   (this is the end or "to" date.)<br>
				      # -o yyyy-mm-dd     (this is the old file date, i.e., in case you want to search in another day.)<br>
				      # -l n              (this is the value you may want to consider as timeout threshold while checking apimetrics.)</p>
				 # </code><br>

				 # <h2>Quick Useful Log Paths</h2><br>
				 # <b>PROD:</b> /logs/rhs/production/apps/RHSplss20*-apilog.log - API's request/response<br> 
				 # <b>PROD:</b> /logs/rhs/production/apps/RHS*apimetrics.log -  Reduced logs from API failures<br>
				 # <b>PROD:</b> /logs/rhs/production/apps/RHSplss20??-??-btmetrics.log - BT's request/response<br>
				 # <b>PROD:</b> /logs/rhs/production/apps/RHSplss20*-premiere.log<br>
				 # <b>TRNG:</b> /logs/rhs/training/apps/RHSServer1*apimetrics.log - Reduced logs from BT failures};
		$content .= "</td></tr>" . "<tr><td align=\"right\">Command:</td><td colspan=\"3\">" . $cgi->textfield(-name => 'command', -size => "120") . "&nbsp;" .
		$cgi->submit('Go') . "</td></tr>" . "</table>" .
		# "For more <b>Usefull Commands</b>, please check <a href=\"\">here</a>" .
		$cgi->end_form;
}

#$page->set_content($content);
print $content;

#$page->process;
print $cgi->end_html;

sub filter {
	my $input = join("", @_);

	$input =~ s/\</&lt;/g;
	$input =~ s/\>/&gt;/g;

	return $input;
}

sub run {
	$SIG{ALRM} = sub {};
	#$SIG{PIPE} = 'IGNORE';
	my $command = shift;
	my $servers = shift;
	my $timeout = shift;
	my $user = shift;
	
	$user ||= "webadmin";

	my %results;
	my %threads;
	foreach my $server (@{$servers}) {
		$threads{$server} = threads->new('_run_command', $user, $server, $command, $timeout);
	}
	
	foreach my $server (@{$servers}) {
		$results{$server} = $threads{$server}->join();
	#	$results{$server} = _run_command($user, $server, $command, $timeout);
	}

	return \%results;
}

sub process_each {
	my ($results, $command) = @_;

	open2(\*READ, \*WRITE, $command);
	my %out;
	foreach my $server (keys(%{$results})) {
		print WRITE $results->{$server};
		close(WRITE);
		$out{$server} = join("", <READ>);
		close(READ);
	}

	return(\%out);
} 

sub _run_command {
	my $user = shift;
	my $server = shift;
	my $command = shift;
	my $timeout = shift;

	my $result;
	$user =~ tr/[A-Z]/[a-z]/;
	if ($timeout) {
		#$result = alarm_call($timeout, sub { return `ssh -q $user\@$server "$command"`})
		$result = alarm_call($timeout, sub { return `ssh -q $server "$command"`})
	} else {
		my @id = ("/home/webadmin/.ssh/id_rsa");

		my %params = (
	        	protocol => 2,
		        interactive => 0,
        		identity_files => [@id],
	        	debug => 1,
        		options => [
                		"BatchMode yes",
                		"AuthenticationSuccessMsg no",
	                	"ForwardX11 no",
        	        	"ForwardAgent no"
		        	]
			);
		my $ssh = Net::SSH::Perl->new($server, %params);
		$ssh->login($user);
		($result, my $err, my $exit) = $ssh->cmd($command);

		#$result = `ssh -q $user\@$server "$command"`;
		$result = `ssh -q $server "$command"`;
	}
	
	return $result;
}

1;
