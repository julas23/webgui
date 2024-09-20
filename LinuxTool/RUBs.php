<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new class="bg_iframe">
<?php

$ClIp   = "192.168.";

function LoopDados() {
    global $idloja;
    global $iploja;
    global $ClIp;
        $server   = $ClIp.$iploja.".155";
        $username = "root";
        $password = "C0v48r4kT#";
        $command  = "df -h |grep -v tmpfs";
        $chksrv1  = "systemctl status rub-runtime |grep Active:";
        $chksrv2  = "systemctl status rub-clienthost |grep Active:";
        $chksrv3  = "systemctl status postgresql |grep Active:";

        $connection = ssh2_connect($server, 22);
        ssh2_auth_password($connection, $username, $password);

        $stream1 = ssh2_exec($connection, $chksrv1);
        stream_set_blocking($stream1, true);
        $output1 = stream_get_contents($stream1);

        $stream2 = ssh2_exec($connection, $chksrv2);
        stream_set_blocking($stream2, true);
        $output2 = stream_get_contents($stream2);

        $stream3 = ssh2_exec($connection, $chksrv3);
        stream_set_blocking($stream3, true);
        $output3 = stream_get_contents($stream3);

        $stream = ssh2_exec($connection, $command);
        stream_set_blocking($stream, true);
        $output = stream_get_contents($stream);

        echo "<table align=center border=0 width=950>";
        echo "<tr><td width=300><h2>Status dos Serviços e Espaço:</h2></td><td align=left><h3>".$server."</h3></td></tr><tr><td colspan=2>";
        echo "<table border=0 width=950>";
        echo "<tr><td width=750><strong><pre>RunTime:</strong>$output1</pre></td><td>&nbsp;&nbsp;&nbsp;</td><td>
        <a href='svcrun.php?username=root&server=$server&func=stop&svctgt=rub-runtime' target=_blank>stop</a>
        <a href='svcrun.php?username=root&server=$server&func=start&svctgt=rub-runtime' target=_blank>start</a>
        <a href='svcrun.php?username=root&server=$server&func=restart&svctgt=rub-runtime' target=_blank>restart</a>
        </td></tr>";
        echo "<tr><td width=750><strong><pre>Client-Host:</strong>$output2</pre><td>&nbsp;&nbsp;&nbsp;</td></td><td>
        <a href='svcrun.php?username=root&server=$server&func=stop&svctgt=rub-clienthost' target=_blank>stop</a>
        <a href='svcrun.php?username=root&server=$server&func=start&svctgt=rub-clienthost' target=_blank>start</a>
        <a href='svcrun.php?username=root&server=$server&func=restart&svctgt=rub-clienthost' target=_blank>restart</a>
        </td></tr>";
        echo "<tr><td width=750><strong><pre>PostGres:</strong>$output3</pre><td>&nbsp;&nbsp;&nbsp;</td></td><td>
        <a href='svcrun.php?username=root&server=$server&func=stop&svctgt=postgresql' target=_blank>stop</a>
        <a href='svcrun.php?username=root&server=$server&func=start&svctgt=postgresql' target=_blank>start</a>
        <a href='svcrun.php?username=root&server=$server&func=restart&svctgt=postgresql' target=_blank>restart</a></td></tr>";
        echo "</table></td></tr>";
        echo "<tr><td colspan=2><pre><strong>Espaço em Disco:</strong><br>$output</pre></td></tr></table><br><br><br>";
}
for ($idloja = 0; $idloja <= 23; $idloja++) {
    if ( $idloja == "01") { echo ""; }
    if ( $idloja == "02") { $iploja  =  "1";  LoopDados(); }
    if ( $idloja == "03") { $iploja  =  "3";  LoopDados(); }
    if ( $idloja == "04") { $iploja  =  "4";  LoopDados(); }
    if ( $idloja == "05") { $iploja  =  "5";  LoopDados(); }
    if ( $idloja == "06") { $iploja  =  "6";  LoopDados(); }
    if ( $idloja == "07") { $iploja  =  "7";  LoopDados(); }
    if ( $idloja == "08") { echo ""; }
    if ( $idloja == "09") { $iploja  =  "9";  LoopDados(); }
    if ( $idloja == "10") { $iploja  = "10";  LoopDados(); }
    if ( $idloja == "11") { $iploja  = "11";  LoopDados(); }
    if ( $idloja == "12") { $iploja  = "12";  LoopDados(); }
    if ( $idloja == "13") { echo ""; }
    if ( $idloja == "14") { echo ""; }
    if ( $idloja == "15") { echo ""; }
    if ( $idloja == "16") { $iploja  = "16";  LoopDados(); }
    if ( $idloja == "17") { $iploja  = "17";  LoopDados(); }
    if ( $idloja == "18") { echo ""; }
    if ( $idloja == "19") { $iploja  = "19";  LoopDados(); }
    if ( $idloja == "20") { $iploja  = "20";  LoopDados(); }
    if ( $idloja == "21") { $iploja  = "21";  LoopDados(); }
    if ( $idloja == "22") { echo ""; }
}
?>
</body></html>
