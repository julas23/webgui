<html>
<head>
	<link href="img/style.css" rel="stylesheet" />
</head>
<body class="bg_iframe">

<h1>PostGres:</h1>

<?php

$cmd1 = "fping ";
$cmd2 = "nmap ";
$cmd3 = " -Pn -sT -p 5432 |awk 'NR==6'";

$ClIp = "192.168.";
$Nt1  = "1.";
$Nt2  = "99.";
$QtdPG= "3";

$IP1  = "4";
$IP2  = "23";
$IP3  = "173";
$IP4  = "76";
$IP = array("$IP1", "$IP2", "$IP3", "$IP4");

$DESC1  = "Produção";
$DESC2  = "Secundário";
$DESC3  = "Homologação";
$DESC4  = "BI";
$DESC = array("$DESC1", "$DESC2", "$DESC3", "$DESC4");



for ($rtpg = 0; $rtpg <= $QtdPG; $rtpg++) {
    $IdPG = $IP[$rtpg];
    $DescPG = $DESC[$rtpg];
    if($rtpg > 2) { $IpPG = $ClIp.$Nt2.$IdPG; }
    else { $IpPG = $ClIp.$Nt1.$IdPG; }

    $result1 = shell_exec($cmd1.$IpPG);
    $result2 = shell_exec($cmd2.$IpPG.$cmd3);

    if(strpos($result1, 'alive') !== false) { $color1 = "lightgreen"; }
    elseif(strpos($result1, 'unreachable') !== false) { $color1 = "red"; }
    else {$color1 ="yellow";}

    if(strpos($result2, 'open') !== false) { $color2 = "lightgreen"; }
    elseif(strpos($result2, 'closed') !== false) { $color2 = "red"; }
    elseif(strpos($result2, 'filtered') !== false) { $color2 = "yellow"; }
    else {$color2 ="white";}

    echo "<table border=0><caption><h1>PostGres $DescPG - $IpPG<h1></caption>";
    echo "<tr><td width=50><font color=black><strong>Ping: </strong></font></td><td align=left bgcolor=$color1 width=150><font color=black>$result1</font></td></tr>";
    echo "<tr><td width=50><font color=black><strong>Port: </strong></font></td><td align=left bgcolor=$color2 width=350><font color=black>$result2</font></h3></td></tr></table><br><br><br>";
}

?>

</body></html>
