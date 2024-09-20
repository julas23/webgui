<html>
<head>
<link href="img/style.css" rel="stylesheet" />
</head>
<body font=courier-new bgcolor=#ffffff>

<?php

$ClIp = "192.168.";
$XenP = "16";
$XenS = "17";

for ($idloja = 1; $idloja <= 22; $idloja++) {
    if ( $idloja == "1" ) { echo ""; }
    if ( $idloja == "2" ) { echo "<center><h1>Loja $idloja</h1> <h2>Ainda não foi migrada</h2></center><br><br><br><br>"; }
    if ( $idloja == "3" ) { $IpLoja = $ClIp."3."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "4" ) { $IpLoja = $ClIp."4."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "5" ) { $IpLoja = $ClIp."5."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "6" ) { $IpLoja = $ClIp."6."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "7" ) { echo "<center><h1>Loja $idloja</h1> <h2>Ainda não foi migrada</h2></center><br><br><br><br>"; }
    if ( $idloja == "8" ) { echo ""; }
    if ( $idloja == "9" ) { echo "<center><h1>Loja $idloja</h1> <h2>Ainda não foi migrada</h2></center><br><br><br><br>"; }
    if ( $idloja == "10") { $IpLoja = $ClIp."10."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "11") { $IpLoja = $ClIp."11."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "12") { $IpLoja = $ClIp."12."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "13") { echo ""; }
    if ( $idloja == "14") { echo ""; }
    if ( $idloja == "15") { echo ""; }
    if ( $idloja == "16") { $IpLoja = $ClIp."16."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "17") { $IpLoja = $ClIp."17."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "18") { echo ""; }
    if ( $idloja == "19") { $IpLoja = $ClIp."19."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "20") { $IpLoja = $ClIp."20."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "21") { $IpLoja = $ClIp."21."; $IpSrvP = $IpLoja.$XenP; $IpSrvS = $IpLoja.$XenS; LoopXenSrv(); }
    if ( $idloja == "22") { echo ""; }
}

function LoopXenSrv() {

    global $ClIp;
    global $IpLoja;
    global $XenP;
    global $XenS;
    global $IpSrvP;
    global $IpSrvS;
    global $idloja;

    $server1   = $IpSrvP;
    $server2   = $IpSrvS;
    $username = "root";
    $password = "C0v48r4kT#";

    $VM1 = "Pr-Bal-Pri";
    $VM2 = "Pr-Bal-Ras";
    $VM3 = "Pr-RUB";
    $VM4 = "Pr-FS";
    $VM5 = "Se-Bal-Pri";
    $VM6 = "Se-Bal-Ras";
    $VM7 = "Se-RUB";
    $VM8 = "Se-FS";
    $VM = array("$VM1", "$VM2", "$VM3", "$VM4", "$VM5", "$VM6", "$VM7", "$VM8");

    $IP1 = "223";
    $IP2 = "222";
    $IP3 = "155";
    $IP4 = "3";
    $IP5 = "223";
    $IP6 = "222";
    $IP7 = "155";
    $IP8 = "3";
    $IP = array("$IP1", "$IP2", "$IP3", "$IP4", "$IP5", "$IP6", "$IP7", "$IP8");

    $Pt1 = "3389";
    $Pt2 = "3389";
    $Pt3 = "22";
    $Pt4 = "22";
    $Pt5 = "3389";
    $Pt6 = "3389";
    $Pt7 = "22";
    $Pt8 = "22";
    $Pt = array("$Pt1", "$Pt2", "$Pt3", "$Pt4", "$Pt5", "$Pt6", "$Pt7", "$Pt8");


    $StPgXe1 = shell_exec("fping $IpSrvP |awk '{print $3}'");
    $StPtXe1 = shell_exec("nmap $IpSrvP -Pn -sT -p 22 |awk 'NR==6' |awk '{print $2}'");

    $command  = "hostname";
    $connection = ssh2_connect($server1, 22);
    ssh2_auth_password($connection, $username, $password);
    $stream = ssh2_exec($connection, $command);
    stream_set_blocking($stream, true);
    $output = stream_get_contents($stream);

    echo "
            <table align=center border=0 bgcolor=white><tr><td colspan=2 align=center><h1>Loja ".$idloja."</h1></td></tr><tr><td>
                <table border=0 align=center bgcolor=white>
                    <tr>
                        <td colspan=2>
                            <table border=0 width=400 bgcolor=#cccccc>
                                <caption>$output</caption>
                                <tr>
                                    <td colspan=2><table><td width=200 align=center>$IpSrvP</td><td width=100>$StPgXe1</td><td width=100>$StPtXe1</td></table></td>
                                </tr>
                                <tr>
    ";


    for ($idvm = 0; $idvm <= 3; $idvm++) {
        if($idvm == 2) { $TBLin = '</tr><tr>'; } else { $TBLin = '</td>'; }

        $IPV     = $IP[$idvm];
        $IPVM    = $IpLoja.$IPV;

        $PtV     = $Pt[$idvm];
        $PtVM    = $PtV;

        $pointer = $VM[$idvm];

        $StPg = shell_exec("fping $IPVM |awk '{print $3}'");
        $StPt = shell_exec("nmap $IPVM -Pn -sT -p $PtVM |awk 'NR==6' |awk '{print $2}'");

        $command1  = "xe vm-list name-label=$pointer |grep power-state |cut -c 24-30";
        $command2  = "xe vm-list name-label=$pointer params=start-time |cut -c 23-30,32-36";

        $connection = ssh2_connect($server1, 22);
        ssh2_auth_password($connection, $username, $password);
        $stream1 = ssh2_exec($connection, $command1);
        stream_set_blocking($stream1, true);
        $output1 = stream_get_contents($stream1);
        $stream2 = ssh2_exec($connection, $command2);
        stream_set_blocking($stream2, true);
        $output2 = stream_get_contents($stream2);

        echo "$TBLin
            <td width=200 bgcolor=#eeeeee>
                <table width=200 border=0>
                    <tr><td align=center colspan=2>$pointer<br>$IPVM</td></tr>
                    <tr><td>Ping:</td><td align=right>$StPg</td></tr>
                    <tr><td>Porta:</td><td align=right>$StPt</td></tr>
                    <tr><td>Status:</td><td align=right>$output1</td></tr>
                    <tr><td>Uptime:</td><td align=right>$output2</td></tr>";
        echo "<tr><td colspan=2><table width='100%' align=center><tr>
            <td width=65 align=center bgcolor=white><a class='hvr-fade2' href='vmact.php?username=root&server=$server1&func=shutdown&vmname=$pointer' target=_blank>Off</a></td>
            <td width=65 align=center bgcolor=white><a class='hvr-fade2' href='vmact.php?username=root&server=$server1&func=start&vmname=$pointer' target=_blank>On</a></td>
            <td width=65 align=center bgcolor=white><a class='hvr-fade2' href='vmact.php?username=root&server=$server1&func=reboot&vmname=$pointer' target=_blank>Reboot</a></td></tr></table>
        </td></tr>";
        echo "</table>";
    }
        echo "</td></tr></table><td border=0 bgcolor=white>&nbsp</td><td>";


    $StPgXe2 = shell_exec("fping $IpSrvS |awk '{print $3}'");
    $StPtXe2 = shell_exec("nmap $IpSrvS -Pn -sT -p 22 |awk 'NR==6' |awk '{print $2}'");

    $command  = "hostname";
    $connection = ssh2_connect($server2, 22);
    ssh2_auth_password($connection, $username, $password);
    $stream = ssh2_exec($connection, $command);
    stream_set_blocking($stream, true);
    $output = stream_get_contents($stream);

        echo "
                            <table border=0 width=400 bgcolor=#cccccc>
                                <caption>$output</caption>
                                <tr>
                                    <td colspan=2><table><td width=200 align=center>$IpSrvS</td><td width=100>$StPgXe2</td><td width=100>$StPtXe2</td></table></td>
                                </tr>
                                <tr>
    ";

    for ($idvm = 4; $idvm <= 7; $idvm++) {
        if($idvm == 6) { $TBLin = '</tr><tr>'; } else { $TBLin = '</td>'; }

        $IPV     = $IP[$idvm];
        $IPVM    = $IpLoja.$IPV;

        $PtV     = $Pt[$idvm];
        $PtVM    = $PtV;

        $pointer = $VM[$idvm];

        $StPg = shell_exec("fping $IPVM |awk '{print $3}'");
        $StPt = shell_exec("nmap $IPVM -Pn -sT -p $PtVM |awk 'NR==6' |awk '{print $2}'");

        $command1  = "xe vm-list name-label=$pointer |grep power-state |cut -c 24-30";
        $command2  = "xe vm-list name-label=$pointer params=start-time |cut -c 23-30,32-36";

        $connection = ssh2_connect($server1, 22);
        ssh2_auth_password($connection, $username, $password);
        $stream1 = ssh2_exec($connection, $command1);
        stream_set_blocking($stream1, true);
        $output1 = stream_get_contents($stream1);
        $stream2 = ssh2_exec($connection, $command2);
        stream_set_blocking($stream2, true);
        $output2 = stream_get_contents($stream2);

        echo "$TBLin
            <td width=200 bgcolor=#eeeeee>
                <table width=200 border=0>
                    <tr><td align=center colspan=2>$pointer<br>$IPVM</td></tr>
                    <tr><td>Ping:</td><td align=right>$StPg</td></tr>
                    <tr><td>Porta:</td><td align=right>$StPt</td></tr>
                    <tr><td>Status:</td><td align=right>$output1</td></tr>
                    <tr><td>Uptime:</td><td align=right>$output2</td></tr>";
        echo "<tr><td colspan=2><table width='100%' align=center><tr>
            <td width=65 align=center bgcolor=white><a class='hvr-fade2' href='vmact.php?username=root&server=$server1&func=shutdown&vmname=$pointer' target=_blank>Off</a></td>
            <td width=65 align=center bgcolor=white><a class='hvr-fade2' href='vmact.php?username=root&server=$server1&func=start&vmname=$pointer' target=_blank>On</a></td>
            <td width=65 align=center bgcolor=white><a class='hvr-fade2' href='vmact.php?username=root&server=$server1&func=reboot&vmname=$pointer' target=_blank>Reboot</a></td></tr></table>
        </td></tr>";
        echo "</table>";
    }
        echo "</td></tr></table></table>";
        echo "<br><br><br><br>";
}
?>
</body>
</html>
