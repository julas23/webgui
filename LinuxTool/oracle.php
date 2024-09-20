<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new class="bg_iframe">

<?php

$ClIp = "192.168.1.";

$ORA1 = "17";
$ORA2 = "24";

$StPr = shell_exec("fping ".$ClIp.$ORA1."|awk '{print $3}'");
$StSe = shell_exec("fping ".$ClIp.$ORA2."|awk '{print $3}'");
$PtPr = shell_exec("nmap ".$ClIp.$ORA1." -Pn -sT -p 1521 |awk 'NR==6 {print $2}'");
$PtSe = shell_exec("nmap ".$ClIp.$ORA2." -Pn -sT -p 1521 |awk 'NR==6 {print $2}'");

$username = "root";
$password = "C0v48r4kT#";

$server = $ClIp.$ORA1;

$instORA1 = "RM";
$instORA2 = "TAF";
$instORA3 = "TSA";
$instORA4 = "TSS";
$instORA = array("$instORA1", "$instORA2", "$instORA3", "$instORA4");

if(strpos($StPr, 'alive') !== false) { $color1 = "lightgreen"; }
elseif(strpos($StPr, 'unreachable') !== false) { $color1 = "red"; }
else {$color1 ="yellow";}

if(strpos($StSe, 'alive') !== false) { $color2 = "lightgreen"; }
elseif(strpos($StSe, 'unreachable') !== false) { $color2 = "red"; }
else {$color2 ="yellow";}

if(strpos($PtPr, 'open') !== false) { $color3 = "lightgreen"; }
elseif(strpos($PtPr, 'closed') !== false) { $color3 = "red"; }
elseif(strpos($PtPr, 'filtered') !== false) { $color3 = "yellow"; }
else {$color3 ="white";}

if(strpos($PtSe, 'open') !== false) { $color4 = "lightgreen"; }
elseif(strpos($PtSe, 'closed') !== false) { $color4 = "red"; }
elseif(strpos($PtSe, 'filtered') !== false) { $color4 = "yellow"; }
else {$color4 ="white";}

echo "<table align=center border=0><tr><td>";

echo "<table align=center border=1>";
echo "<tr><td align=center colspan=2 width=250>Oracle Produção</td></tr>";
echo "<tr><td>Servidor:</td><td align=right bgcolor=$color1>$StPr</td></tr>";
echo "<tr><td>Porta:</td><td align=right bgcolor=$color3>$PtPr</td></tr>";
echo "</table>";

echo "</td><td>&nbsp;&nbsp;</td><td>";

echo "<table align=center border=1>";
echo "<tr><td align=center colspan=2 width=250>Oracle Reserva</td></tr>";
echo "<tr><td>Servidor:</td><td align=right bgcolor=$color2>$StSe</td></tr>";
echo "<tr><td>Porta:</td><td align=right bgcolor=$color4>$PtSe</td></tr>";
echo "</table>";

echo "</td></tr><tr><td colspan=3><table><tr><td><br><br>";

for ($iora = 0; $iora <= 3; $iora++) {
    $Inst = $instORA[$iora];
    $command  = "netstat -putan |grep ESTABELECIDA |grep oracle |grep $Inst  2> /dev/null |grep -v root@ |wc -l";

    $connection = ssh2_connect($server, 22);
    ssh2_auth_password($connection, $username, $password);
    $stream = ssh2_exec($connection, $command);
    stream_set_blocking($stream, true);
    $output = stream_get_contents($stream);

    echo "Conexões ativas $Inst: $output<br>";

}
echo "</td></tr></table></td></tr><tr><td>";

$command  = "sqlplus rm/rm @checksessions.sql 2> /dev/null |awk 'NR==13'";
$connection = ssh2_connect("192.168.1.17", 22);
ssh2_auth_password($connection, oracle, covabra);
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
echo "Sessões no Oracle: ".$output;
echo "</td></tr></table>";

?>

</body></html>
