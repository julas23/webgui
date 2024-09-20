<html>
<head>
<link href="img/style.css" rel="stylesheet" />
</head>
<body font=courier-new class="bg_iframe">

<?php

$ClIp     = "192.168.";
$command1 = "netstat -putan |grep ESTABLISHED |grep -v 127. |grep -v '192.168.1.4' |grep java |awk '{print $5}' |cut -d: -f1 |sort |uniq |wc -l";
$command2 = "netstat -putan |grep ESTABLISHED |grep -v 127. |grep -v '192.168.1.4' |grep java |awk '{print $5}' |cut -d: -f1 |sort |uniq";
$memusepp = "pmap -x `ps -ef |grep jboss |grep -v grep |grep jboss-eap-6.1/bin/standalone.sh |awk '{print $3}'` |tail -n 1 |awk '{print $3}'";
$memusepf = "pmap -x `ps -ef |grep jboss |grep -v grep |grep jboss-eap-6.1/bin/standalone.sh |awk '{print $2}'` |tail -n 1 |awk '{print $3}'";
$memusejb = "pmap -x `ps -ef |grep /usr/local/jdk |grep -v grep |awk '{print $2}'` |tail -n 1 |awk '{print $4}'";
$username = "root";
$password = "C0v48r4kT#";

$JBoss0   = "1.22";
$JBoss1   = "1.35";
$JBoss2   = "99.110";
$JBoss3   = "1.140";
$JBoss4   = "1.158";
$JBoss5   = "1.159";
$JBoss6   = "99.176";
$JBoss7   = "99.177";
$JBoss8   = "202.101";
$JBoss9   = "202.102";
$JBoss10  = "1.18";
$JBoss11  = "1.19";
$JBoss12  = "1.20";
$JBoss13  = "1.166";
$JBoss14  = "1.167";
$JBoss15  = "1.168";
$JBoss = array("$JBoss0", "$JBoss1", "$JBoss2", "$JBoss3", "$JBoss4", "$JBoss5", "$JBoss6", "$JBoss7", "$JBoss8", "$JBoss9", "$JBoss10", "$JBoss11", "$JBoss12", "$JBoss13", "$JBoss14", "$JBoss15");

echo "<table border=1 align=center><caption>Consumo dos JBoss</caption><tr>";

for ($ipjb = 0; $ipjb <= 15; $ipjb++) {
    if($ipjb == 6) { $TBLin = '</tr></table><br><table border=1 width=150 align=center><tr>'; }
    elseif($ipjb == 12) { $TBLin = '</tr></table><br><table border=1 width=150 align=center><tr>'; }
    else { $TBLin = '</td>'; }

    global $command1;
    global $command2;
    global $username;
    global $password;
    global $ClIp;
    global $memusepp;
    global $memusepf;
    global $memusejb;

    $IDJB   = $JBoss[$ipjb];
    $server = $ClIp.$IDJB;
    $svc    = "jboss";

    $connection = ssh2_connect($server, 22);
    ssh2_auth_password($connection, $username, $password);

    $stream1 = ssh2_exec($connection, $command1);
    stream_set_blocking($stream1, true);
    $output1 = stream_get_contents($stream1);

    $stream2 = ssh2_exec($connection, $command2);
    stream_set_blocking($stream2, true);
    $output2 = stream_get_contents($stream2);

    $stream3 = ssh2_exec($connection, $memusepp);
    stream_set_blocking($stream3, true);
    $output3 = stream_get_contents($stream3);

    $stream4 = ssh2_exec($connection, $memusepf);
    stream_set_blocking($stream4, true);
    $output4 = stream_get_contents($stream4);

    $stream5 = ssh2_exec($connection, $memusejb);
    stream_set_blocking($stream5, true);
    $output5 = stream_get_contents($stream5);

    echo "$TBLin";
    echo "<td valign='top' width=150>";
    echo "<table border=0 width=150><tr><td>$server</td></tr>";
    echo "<tr><td> 
        <a href='svcrun.php?username=root&server=$server&func=stop&svctgt=$svc' target=_blank>stop</a>
        <a href='svcrun.php?username=root&server=$server&func=start&svctgt=$svc' target=_blank>start</a>
        <a href='svcrun.php?username=root&server=$server&func=restart&svctgt=$svc' target=_blank>restart</a>
    </td></tr>";
    echo "<tr><td><pre>KB Java <strong>".$output3."</strong></pre></td></tr>";
    echo "<tr><td><pre>KB JBoss <strong>".$output4."</strong></pre></td></tr>";
    echo "<tr><td><pre>KB JVM <strong>".$output5."</strong></pre></td></tr>";
    echo "<tr><td><strong>$output1 </strong>Conexões</td></tr>";
    echo "<tr><td><pre>".$output2."</pre></td></tr></table>";
    echo "</td>";
}

echo "</table>";

?>

</body>
</html>
