<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new>
<?php
$SRV1	="192.168.1.4";    //máquina linux SSH
$SRV2	="192.168.1.17";   //máquina linux SSH
$SRV3	="192.168.1.21";   //máquina linux SSH
$SRV4	="192.168.1.22";   //máquina linux SSH
$SRV5	="192.168.1.26";   //máquina linux SSH
$SRV6	="192.168.1.31";   //máquina linux SSH
$SRV7	="192.168.1.39";   //máquina linux SSH
$SRV8	="192.168.1.16";   //máquina linux SSH
$SRV9	="192.168.1.10";   //máquina linux SSH
$SRV10	="192.168.1.33";   //máquina linux SSH
$SRV11	="192.168.1.35";   //máquina linux SSH
$SRV12	="192.168.1.84";   //máquina linux SSH
$SRV13	="192.168.1.173";  //máquina linux SSH
$SRV14	="192.168.1.23";   //máquina linux SSH
$SRV15	="192.168.1.7";    //máquina linux SSH
$SRV16	="192.168.99.3";   //máquina linux SSH
$SRV17	="192.168.99.76";  //máquina linux SSH
$SRV18	="192.168.99.176"; //máquina linux SSH
$SRV19	="192.168.99.110"; //máquina linux SSH
$SRV20	="192.168.99.106"; //máquina linux SSH
$SRV21	="192.168.1.70";   //máquina windows SNMP
$SRV22	="192.168.1.37";   //máquina windows SNMP
$SRV23	="192.168.1.27";   //máquina windows (sem SNMP)
$SRV24	="192.168.1.25";   //máquina windows (sem SNMP)
$SRV = array("$SRV1", "$SRV2", "$SRV3", "$SRV4", "$SRV5", "$SRV6", "$SRV7", "$SRV8","$SRV9", "$SRV10", "$SRV11", "$SRV12", "$SRV13", "$SRV14", "$SRV15", "$SRV16","$SRV17", "$SRV18", "$SRV19", "$SRV20", "$SRV21", "$SRV22", "$SRV23", "$SRV24");
for ($idsrv = 0; $idsrv <= 23; $idsrv++) {
    $server   = $SRV[$idsrv];
    global $server;
    if ($idsrv > 19) {
        $DSKSPC = shell_exec("snmpwalk -v 1 -c covabra $server HOST-RESOURCES-MIB::hrStorageSize.1 |awk '{print $4}'");
        $DSKUSE = shell_exec("snmpwalk -v 1 -c covabra $server HOST-RESOURCES-MIB::hrStorageUsed.1 |awk '{print $4}'");
        $A = $DSKUSE*100;
        $B = $A/$DSKSPC;
        echo "<table align=center border=0 width=650>";
        echo "<tr><td width=170 colspan=2><h2>Consumo de espaço no Servidor:</h2></td><td align=left colspan=2><h3>".$server."</h3></td></tr>";
        echo "<tr><td width=155><pre>Espaço em Disco:</pre></td><td width=155><pre><strong>$DSKSPC</strong></pre></td><td width=155><pre>Espaço Usado:</pre></td><td width=155><pre><strong>$DSKUSE</strong></pre></td></tr>";
        echo "<tr><td align=center colspan=4><pre>Consumo de ".number_format($B, 2, '.', ',')."% Usado</h3></pre></td></tr></table><br><br><br>";
    }
    else { 
        $username = "root";
        $password = "C0v48r4kT#";
        $command  = "df -h |grep -v tmpfs";
        $connection = ssh2_connect($server, 22);
        ssh2_auth_password($connection, $username, $password);
        $stream = ssh2_exec($connection, $command);
        stream_set_blocking($stream, true);
        $output = stream_get_contents($stream);
        echo "<table align=center border=0 width=650>";
        echo "<tr><td width=300><h2>Consumo de espaço no Servidor:</h2></td><td align=left><h3>".$server."</h3></td></tr>";
        echo "<tr><td colspan=2><pre>$output</pre></td></tr></table><br><br><br>";
    }
}
?>
</body></html>
