<html>
<head>
	<link href="img/style.css" rel="stylesheet" />
</head>
<body bgcolor=#ffffff class="bg_iframe">

<?php

$cmd1 = "fping ";
$cmd2 = "nmap ";
$cmd3 = " -Pn -sT -p 4447 |awk 'NR==6'";

$ClIp = "192.168.";
$Nt1  = "1.";
$Nt2  = "99.";
$Nt3  = "202.";
$QtdJb= "15";

$IP1  = "22";
$IP2  = "35";
$IP3  = "140";
$IP4  = "158";
$IP5  = "159";
$IP6  = "18";
$IP7  = "19";
$IP8  = "20";
$IP9  = "166";
$IP10 = "167";
$IP11 = "168";
$IP12 = "110";
$IP13 = "176";
$IP14 = "177";
$IP15 = "101";
$IP16 = "102";
$IP = array("$IP1", "$IP2", "$IP3", "$IP4", "$IP5", "$IP6", "$IP7", "$IP8", "$IP9", "$IP10", "$IP11", "$IP12", "$IP13", "$IP14", "$IP15", "$IP16");

for ($rtjb = 0; $rtjb <= $QtdJb; $rtjb++) {
    $IdJb = $IP[$rtjb];
    if($rtjb < 11) { $IpJb = $ClIp.$Nt1.$IdJb; }
    elseif($rtjb > 13) { $IpJb = $ClIp.$Nt3.$IdJb; }
    else { $IpJb = $ClIp.$Nt2.$IdJb; }

    $result1 = shell_exec($cmd1.$IpJb);
    $result2 = shell_exec($cmd2.$IpJb.$cmd3);

    if(strpos($result1, 'alive') !== false) { $color1 = "lightgreen"; }
    elseif(strpos($result1, 'unreachable') !== false) { $color1 = "red"; }
    else {$color1 ="yellow";}

    if(strpos($result2, 'open') !== false) { $color2 = "lightgreen"; }
    elseif(strpos($result2, 'closed') !== false) { $color2 = "red"; }
    elseif(strpos($result2, 'filtered') !== false) { $color2 = "yellow"; }
    else {$color2 ="white";}

    echo "<table border=0><caption><h1>Jboss $IdJb<h1></caption>";
    echo "<tr><td width=50><font color=black><strong>Ping: </strong></font></td><td align=left bgcolor=$color1 width=150><font color=black>$result1</font></td></tr>";
    echo "<tr><td width=50><font color=black><strong>Port: </strong></font></td><td align=left bgcolor=$color2 width=350><font color=black>$result2</font></h3></td></tr></table><br><br><br>";
}

?>

</body></html>
