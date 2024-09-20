<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new>
<?php

$ClIp   = "192.168.";
$svc1   = "smb";
$svc2   = "smbd";
$svc3   = "samba";

function LoopDados() {
    global $idloja;
    global $iploja;
    global $ClIp;
    global $svc;
        $server   = $ClIp.$iploja.".3";
        $username = "root";
        $password = "C0v48r4kT#";
        $command1  = "df -h |grep -v tmpfs |grep -v none |grep -v udev";
        $command2  = "systemctl status $svc |grep Active:";
        $connection = ssh2_connect($server, 22);
        ssh2_auth_password($connection, $username, $password);

        $stream1 = ssh2_exec($connection, $command1);
        stream_set_blocking($stream1, true);
        $output1 = stream_get_contents($stream1);

        $stream2 = ssh2_exec($connection, $command2);
        stream_set_blocking($stream2, true);
        $output2 = stream_get_contents($stream2);

        echo "<table align=center border=0 width=950>";
        echo "<tr><td><h2>Consumo de espaço no Servidor:</h2></td><td align=left><h3>".$server."</h3></td></tr>";
        echo "<tr><td width=800><pre><strong>SAMBA</strong> $output2</pre></td><td>

        <a href='svcrun.php?username=root&server=$server&func=stop&svctgt=$svc' target=_blank>stop</a>
        <a href='svcrun.php?username=root&server=$server&func=start&svctgt=$svc' target=_blank>start</a>
        <a href='svcrun.php?username=root&server=$server&func=restart&svctgt=$svc' target=_blank>restart</a>

        </td></tr>";
        echo "<tr><td colspan=2><pre><strong>Espaço em disco</strong><br>$output1</pre></td></tr></table><br><br><br>";
}
for ($idloja = 0; $idloja <= 23; $idloja++) {
    if ( $idloja == "01") { echo ""; }
    if ( $idloja == "02") { $iploja  =  "1"; $svc=$svc2;  LoopDados(); }
    if ( $idloja == "03") { $iploja  =  "3"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "04") { $iploja  =  "4"; $svc=$svc2;  LoopDados(); }
    if ( $idloja == "05") { $iploja  =  "5"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "06") { $iploja  =  "6"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "07") { $iploja  =  "7"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "08") { echo ""; }
    if ( $idloja == "09") { $iploja  =  "9"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "10") { $iploja  = "10"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "11") { $iploja  = "11"; $svc=$svc2;  LoopDados(); }
    if ( $idloja == "12") { $iploja  = "12"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "13") { echo ""; }
    if ( $idloja == "14") { echo ""; }
    if ( $idloja == "15") { echo ""; }
    if ( $idloja == "16") { $iploja  = "16"; $svc=$svc2;  LoopDados(); }
    if ( $idloja == "17") { $iploja  = "17"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "18") { echo ""; }
    if ( $idloja == "19") { $iploja  = "19"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "20") { $iploja  = "20"; $svc=$svc2;  LoopDados(); }
    if ( $idloja == "21") { $iploja  = "21"; $svc=$svc1;  LoopDados(); }
    if ( $idloja == "22") { echo ""; }
}
?>
</body></html>
