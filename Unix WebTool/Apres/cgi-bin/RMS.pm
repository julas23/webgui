package RMS;

#use lib qw{/home/webadmin/unixWebToolRoot/cgi-bin/lib};
use lib qw{/home/webadmin/.cpan/build/Net-SSH-Perl-1.34/lib};
use lib qw{/home/webadmin/.cpan/build/threads-1.86/lib};
use threads;
use Net::SSH::Perl;
use Sys::AlarmCall;


#use Text::Wrap;
#use AlarmCall;
#use Data::Dumper;
#use IPC::Open2;
#use XML::Twig;

use strict;
use warnings;

#require Exporter;
#@ISA = qw(Exporter);
#@EXPORT = qw(run timestamp format_csv format_xml);

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

sub process_all {
	my ($results, $command) = @_;

	open2(\*READ, \*WRITE, $command);
	foreach my $server (keys(%{$results})) {
		print WRITE $results->{$server};
	}
	close(WRITE);
	my $out = join("", <READ>);
	close(READ);

	return($out);
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

# sub timestamp {
	# my $date = `date +"%y%m%d%H%M%S%N"`;
	# chomp $date;
	
	# return $date;
# }
	
# sub format_csv {
	# my @output;
	# foreach my $csv (@_) {
		# my @rows = split("\n", $csv);
		# my @formated_rows;
		# my $line = 1;
		# foreach my $row (@rows) {
			# my $start = "<tr class=\"";
			# $start .= ($line++%2) ? "even" : "odd";
			# $start .= "Row\"><td>";
			# $row =~ s/;/<\/td><td>/g;
			# push(@formated_rows, $start . $row . "</td></tr>\n");
		# }
		# push(@output, \@formated_rows);
	# }
	# return \@output;
# }

sub _run_command {
	my $user = shift;
	my $server = shift;
	my $command = shift;
	my $timeout = shift;

	my $result;
	$user =~ tr/[A-Z]/[a-z]/;
	if ($timeout) {
		$result = alarm_call($timeout, sub { return `ssh -q $server "$command"`})
		#$result = alarm_call($timeout, sub { return `ssh -q $user\@$server "$command"`})
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

# sub format_xml {
	# my $input = shift;

	# my $original = $input;
	# my $out;
	# my $t = new XML::Twig;
	# $t->set_pretty_print( 'indented');
	# $input =~ s/\n//g;
	# $input =~ s/UTF-8 /UTF-8/;
	# $Text::Wrap::columns=80;
	# if ($input =~ /NXHeader/i) {
		# my ($header) = $input =~ m/(.*\<\/NXHeader\>)/;
		# $header =~ s/.*\<\?xml/<?xml/;
		# eval {
			# $t->parse($header);
		# };
		# if ($@) {
			# $out = $header;
		# } else {
			# $out = $t->sprint;
		# }
		# $input =~ s/.*\<\/NXHeader\>//;
	# }

	# $input =~ s/.*\<\?xml/<?xml/;
	# eval {
		# $t->parse($input);
	# };
	# if ($@) {
		# print STDERR $@;
		# print STDERR "\n#####$original#####\n\n";
		# return wrap($original);
	# } else {
		# $out .= $t->sprint;
	# }
	# return wrap("", "", $out);
# }

sub wrap_text {
	my $input = shift;
	my $col = shift;

	$Text::Wrap::columns=120 || $col;
	return wrap("", "", $input);
}

1;