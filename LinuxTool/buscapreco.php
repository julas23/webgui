<?php

$nmlj = $_POST ["numloja"];
$ClIp = "192.168.";

if (empty($nmlj)) {
    for ($idloja = 1; $idloja <= 22; $idloja++) {
        if ( $idloja == "1" ) { echo ""; }
        if ( $idloja == "2" ) { $IpSrv =  $ClIp."1.45"; $IpLoja = "1"; $QtdBuPr = "4"; $IpBP1 = "56"; $IpBP2 = "91"; $IpBP3 = "229"; $IpBP4 = "195"; $IpBP5 = "99.104"; LoopBuPr(); }
        if ( $idloja == "3" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "160"; $IpBP2 = "161"; $IpBP3 = "158"; $IpBP4 = "218"; $IpBP5 = "185"; LoopBuPr(); }
        if ( $idloja == "4" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "160"; $IpBP2 = "161"; $IpBP3 = "162"; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "5" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "160"; $IpBP2 = ""; $IpBP3 = ""; $IpBP4 = "163"; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "6" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "215"; $IpBP2 = "219"; $IpBP3 = "218"; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "7" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "220"; $IpBP2 = "221"; $IpBP3 = "225"; $IpBP4 = "226"; $IpBP5 = "227"; LoopBuPr(); }
        if ( $idloja == "8" ) { echo ""; }
        if ( $idloja == "9" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "5"; $IpBP1 = "216"; $IpBP2 = "218"; $IpBP3 = "219"; $IpBP4 = "215"; $IpBP5 = "217"; $IpBP5 = "159"; LoopBuPr(); }
        if ( $idloja == "10") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "90"; $IpBP2 = "214"; $IpBP3 = "211"; $IpBP4 = "243"; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "11") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "167"; $IpBP2 = "170"; $IpBP3 = "172"; $IpBP4 = "168"; $IpBP5 = "169"; LoopBuPr(); }
        if ( $idloja == "12") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "8"; $IpBP1 = "190"; $IpBP2 = "64"; $IpBP3 = "42"; $IpBP4 = "176"; $IpBP5 = "174"; $IpBP6 = "199"; $IpBP7 = "68"; $IpBP8 = "71"; $IpBP9 = "55"; LoopBuPr(); }
        if ( $idloja == "13") { echo ""; }
        if ( $idloja == "14") { echo ""; }
        if ( $idloja == "15") { echo ""; }
        if ( $idloja == "16") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "92"; $IpBP2 = "215"; $IpBP3 = ""; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "17") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "181"; $IpBP2 = "195"; $IpBP3 = ""; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "18") { echo ""; }
        if ( $idloja == "19") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "228"; $IpBP2 = "226"; $IpBP3 = ""; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "20") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "5"; $IpBP2 = "6"; $IpBP3 = "7"; $IpBP4 = "8"; $IpBP5 = "9"; LoopBuPr(); }
        if ( $idloja == "21") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "40"; $IpBP2 = "41"; $IpBP3 = "42"; $IpBP4 = "43"; $IpBP5 = "44"; LoopBuPr(); }
        if ( $idloja == "22") { echo ""; }
    }
}

else {
        $idloja = $nmlj;
        if ( $idloja == "1" ) { echo ""; }
        if ( $idloja == "2" ) { $IpSrv =  $ClIp."1.45"; $IpLoja = "1"; $QtdBuPr = "4"; $IpBP1 = "56"; $IpBP2 = "91"; $IpBP3 = "229"; $IpBP4 = "195"; $IpBP5 = "99.104"; LoopBuPr(); }
        if ( $idloja == "3" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "160"; $IpBP2 = "161"; $IpBP3 = "158"; $IpBP4 = "218"; $IpBP5 = "185"; LoopBuPr(); }
        if ( $idloja == "4" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "160"; $IpBP2 = "161"; $IpBP3 = "162"; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "5" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "160"; $IpBP2 = ""; $IpBP3 = ""; $IpBP4 = "163"; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "6" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "215"; $IpBP2 = "219"; $IpBP3 = "218"; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "7" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "220"; $IpBP2 = "221"; $IpBP3 = "225"; $IpBP4 = "226"; $IpBP5 = "227"; LoopBuPr(); }
        if ( $idloja == "8" ) { echo ""; }
        if ( $idloja == "9" ) { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "5"; $IpBP1 = "216"; $IpBP2 = "218"; $IpBP3 = "219"; $IpBP4 = "215"; $IpBP5 = "217"; $IpBP5 = "159"; LoopBuPr(); }
        if ( $idloja == "10") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "90"; $IpBP2 = "214"; $IpBP3 = "211"; $IpBP4 = "243"; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "11") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "192"; $IpBP2 = "187"; $IpBP3 = "56"; $IpBP4 = "87"; $IpBP5 = "89"; LoopBuPr(); }
        if ( $idloja == "12") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "8"; $IpBP1 = "190"; $IpBP2 = "64"; $IpBP3 = "42"; $IpBP4 = "176"; $IpBP5 = "174"; $IpBP6 = "199"; $IpBP7 = "68"; $IpBP8 = "71"; $IpBP9 = "55"; LoopBuPr(); }
        if ( $idloja == "13") { echo ""; }
        if ( $idloja == "14") { echo ""; }
        if ( $idloja == "15") { echo ""; }
        if ( $idloja == "16") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "92"; $IpBP2 = "215"; $IpBP3 = ""; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "17") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "181"; $IpBP2 = "195"; $IpBP3 = ""; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "18") { echo ""; }
        if ( $idloja == "19") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "228"; $IpBP2 = "226"; $IpBP3 = ""; $IpBP4 = ""; $IpBP5 = ""; LoopBuPr(); }
        if ( $idloja == "20") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "5"; $IpBP2 = "6"; $IpBP3 = "7"; $IpBP4 = "8"; $IpBP5 = "9"; LoopBuPr(); }
        if ( $idloja == "21") { $IpSrv = "223"; $IpLoja = "$idloja"; $QtdBuPr = "4"; $IpBP1 = "40"; $IpBP2 = "41"; $IpBP3 = "42"; $IpBP4 = "43"; $IpBP5 = "44"; LoopBuPr(); }
        if ( $idloja == "22") { echo ""; }
}

function LoopBuPr() {
    global $idloja;
    global $BuPr;
    global $IdBuPr;
    global $QtdBuPr;
    global $ClIp;
    global $IpBP1;
    global $IpBP2;
    global $IpBP3;
    global $IpBP4;
    global $IpBP5;
    global $IpBP6;
    global $IpBP7;
    global $IpBP8;
    global $IpBP9;
    global $IpLoja;
    global $IpSrv;
    global $NumBP;
    global $IpBuPr;
    global $RtBuPr;

    echo "<table border=0 align=center bgcolor=white><tr><td><font face=courier>";
        echo "<table align=center bgcolor=white border=0>";
            echo "<caption><font size=4 face=courier color=black><strong>Loja $idloja</strong></caption><tr>";

    $IdBuPr = array("$IpBP1","$IpBP2","$IpBP3","$IpBP4","$IpBP5","$IpBP6","$IpBP7","$IpBP8","$IpBP9");
    for ($RtBuPr = 0; $RtBuPr <= $QtdBuPr; $RtBuPr++) {
        if ( $idloja == "2" && $RtBuPr == 4) { $IpBuPr = "192.168.99.104"; $NumBP = "5";
            $StIpBuPr = shell_exec("fping $IpBuPr 2> /dev/null |awk '{print $3}'"); if (strpos($StIpBuPr, 'alive') !== false ) { $IpStatus = "img/OK.png";} elseif (strpos($StIpBuPr, 'unreachable') !== false ) { $IpStatus = "img/NOK.png";} else {$IpStatus = "img/WAR.png";}
            $StPtBuPr = shell_exec("nmap $IpBuPr -Pn -sT -p 443 |awk 'NR==6' |awk '{print $2}'"); if (strpos($StPtBuPr, 'open') !== false ) { $PtStatus = "img/OK.png";} elseif (strpos($StPtBuPr, 'closed') !== false ) { $PtStatus = "img/NOK.png";} else {$PtStatus = "img/WAR.png";}
            $StDtBuPr = shell_exec("cat /var/www/html/log/$idloja/LAST.log");
            echo "<td width=200 align=left valign=top>";
            echo "<table border=1 width=200 bgcolor=white>";
            echo "<tr><td width=150 align=center colspan=3>Busca Preço $NumBP<br><strong> $IpBuPr </strong></td></tr><tr>";
            echo "<td width=35 align=center>";
                if ($StIpBuPr == "alive") {echo "<font size=1>Ip: <img src=$IpStatus width=10 height=10 alt='Link ok'></font>";}
                elseif ($StIpBuPr == "unreachable") {echo "<font size=1>Ip: <img src=$IpStatus width=10 height=10 alt='Link fora'></font>";}
                else {echo "<font size=1>Ip: <img src=$IpStatus width=10 height=10 alt='Status desconhecido'></font>";}
            echo "</td>";
            echo "<td width=35 align=center>";
                if ($StPtBuPr == "alive") {echo "<font size=1>Pt: <img src=$PtStatus width=10 height=10 alt='Link Ok'></font>";}
                elseif ($StPtBuPr == "unreachable") {echo "<font size=1>Pt: <img src=$PtStatus width=10 height=10 alt='Link Fora'></font>";}
                else {echo "<font size=1>Pt: <img src=$PtStatus width=10 height=10 alt='Status desconhecido'></font>";}
            echo "</td>";
            echo "<td align=center><font size=1>".$StDtBuPr."</font></td>";
            echo "</tr></table></td>";
        }
        else { $IpBuPrV = $IdBuPr[$RtBuPr]; $IpBuPr = $ClIp.$IpLoja.".".$IpBuPrV; $NumBP  = $RtBuPr+1;
            $StIpBuPr = shell_exec("fping $IpBuPr 2> /dev/null |awk '{print $3}'"); if (strpos($StIpBuPr, 'alive') !== false ) { $IpStatus = "img/OK.png";} elseif (strpos($StIpBuPr, 'unreachable') !== false ) { $IpStatus = "img/NOK.png";} else {$IpStatus = "img/WAR.png";}
            $StPtBuPr = shell_exec("nmap $IpBuPr -Pn -sT -p 443 |awk 'NR==6' |awk '{print $2}'"); if (strpos($StPtBuPr, 'open') !== false ) { $PtStatus = "img/OK.png";} elseif (strpos($StPtBuPr, 'closed') !== false ) { $PtStatus = "img/NOK.png";} else {$PtStatus = "img/WAR.png";}
            $StDtBuPr = shell_exec("cat /var/www/html/log/$idloja/LAST.log");
            echo "<td width=200 align=left valign=top>";
                    echo "<table border=1 width=200 bgcolor=white>";
                    echo "<tr><td width=150 align=center colspan=3>Busca Preço $NumBP<br><strong> $IpBuPr </strong></td></tr><tr>";
                    echo "<td width=35 align=center>";
                        if ($StIpBuPr == "alive") {echo "<font size=1>Ip: <img src=$IpStatus width=10 height=10 alt='Link ok'></font>";}
                        elseif ($StIpBuPr == "unreachable") {echo "<font size=1>Ip: <img src=$IpStatus width=10 height=10 alt='Link fora'></font>";}
                        else {echo "<font size=1>Ip: <img src=$IpStatus width=10 height=10 alt='Status desconhecido'></font>";}
                    echo "</td>";
                    echo "<td width=35 align=center>";
                        if ($StPtBuPr == "alive") {echo "<font size=1>Pt: <img src=$PtStatus width=10 height=10 alt='Link Ok'></font>";}
                        elseif ($StPtBuPr == "unreachable") {echo "<font size=1>Pt: <img src=$PtStatus width=10 height=10 alt='Link Fora'></font>";}
                        else {echo "<font size=1>Pt: <img src=$PtStatus width=10 height=10 alt='Status desconhecido'></font>";}
                    echo "</td>";
                    echo "<td align=center><font size=1>".$StDtBuPr."</font></td>";
                    echo "</table>";
                    if($RtBuPr == 4) { $TBLin = '</td></tr><tr>'; } else { $TBLin = '</td>'; }
                echo $TBLin;
        }
    }
    echo $TBLin."</table></font></td></tr></table><br><br><br>";
    echo "";
}

?>
