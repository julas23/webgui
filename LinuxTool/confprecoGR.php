<?php

$Now = new DateTime();
$codigo  = "9788600000705";

set_time_limit(0);
ini_set('mysql.connect_timeout','15');
ini_set('max_execution_time', '1');

$TimeStampI = shell_exec("date +'%a %d %b %H:%M:%S'");
echo "Relatório executado em $TimeStampI";

function LoopDados() {
    $dbname  = 'PDV';
    $dbuser  = 'root';
    $dbpass  = '';
    $dbtabl  = 'T_Produtos';
    $dbtbAu  = 'T_Produtos_Aux';
    global $idloja;
    global $iploja;
    global $codigo;
    global $qtdpdv;
    echo "<br><br><br><center>A Faixa de IP da Loja <strong>$idloja</strong> é [ 192.168.<strong>$iploja</strong>.0/24]</center><br>";
    echo "<table align=center border=0>";
    echo "<tr><td width=80 align=center><strong>PDV</strong></td>
              <td width=150><strong>Preço:</strong></td>
              <td width=150><strong>Data Preço:</strong></td>
              <td width=150><strong>Preço 1:</strong></td>
              <td width=150><strong>Data Preço 1:</strong></td>
              <td width=150><strong>Preço 2</strong></td>
              <td width=150><strong>Data Preço 2:</strong></td>
          </tr></table>";
    for ($idpdv = 1; $idpdv <= $qtdpdv; $idpdv++) {
        $ippdv   = ($idpdv + 100);
        $dbhost  = '192.168.'.$iploja.'.'.$ippdv;
        $connect = @mysql_connect($dbhost, $dbuser, $dbpass);
        if (!$connect){ echo "<center><font color=red>Impossível conectar ao servidor $dbhost</font></center>"; }
        else {
            mysql_select_db($dbname) or print("<center><font color=red>Impossível abrir o banco $dbname</font></center>");
            $result0 = mysql_query("select TABLE_NAME from information_schema.tables where TABLE_SCHEMA='PDV' and TABLE_NAME='T_Produtos_Aux'");
            $result1 = mysql_query("select preco,datapreco,preco1,datapreco1,preco2,datapreco2 from $dbtabl where codbar = '$codigo'");
            $result2 = mysql_query("select preco,datapreco,preco1,datapreco1,preco2,datapreco2 from $dbtbAu where codbar = '$codigo'");
            while( $row1 = mysql_fetch_array($result1)){
                echo "<table align=center border=0>";
                echo "<tr><td width=80 align=center>$idpdv</td>
                    <td width=150>R$ $row1[preco]</td>
                    <td width=150>$row1[datapreco]</td>
                    <td width=150>R$ $row1[preco1]</td>
                    <td width=150>$row1[datapreco1]</td>
                    <td width=150>R$ $row1[preco2]</td>
                    <td width=150>$row1[datapreco2]</td>
                    </tr></table>";
            }
            if (mysql_num_rows($result0)==0) { echo ""; }
            else {
                while( $row2 = mysql_fetch_array($result2)){
                    echo "<table align=center border=0>";
                    echo "<tr>
                        <td width=80 align=center><font color=orange>$idpdv</font></td>
                        <td width=150><font color=orange>R$ $row2[preco]</font></td>
                        <td width=150><font color=orange>$row2[datapreco]</font></td>
                        <td width=150><font color=orange>R$ $row2[preco1]</font></td>
                        <td width=150><font color=orange>$row2[datapreco1]</font></td>
                        <td width=150><font color=orange>R$ $row2[preco2]</font></td>
                        <td width=150><font color=orange>$row2[datapreco2]</font></td>
                        </tr></table>";
                }
            }
            mysql_close();
        }
    }
}

for ($idloja = 01; $idloja <= 22; $idloja++) {
    if ( $idloja == "01") { echo ""; }
    if ( $idloja == "02") { $iploja  = "1"; $qtdpdv  = "20"; LoopDados(); }
    if ( $idloja == "03") { $iploja  = "3"; $qtdpdv  = "24"; LoopDados(); }
    if ( $idloja == "04") { $iploja  = "4"; $qtdpdv  = "16"; LoopDados(); }
    if ( $idloja == "05") { $iploja  = "5"; $qtdpdv  = "18"; LoopDados(); }
    if ( $idloja == "06") { $iploja  = "6"; $qtdpdv  = "16"; LoopDados(); }
    if ( $idloja == "07") { $iploja  = "7"; $qtdpdv  = "12"; LoopDados(); }
    if ( $idloja == "08") { echo ""; }
    if ( $idloja == "09") { $iploja  = "9"; $qtdpdv  = "17"; LoopDados(); }
    if ( $idloja == "10") { $iploja  = "10"; $qtdpdv  = "20"; LoopDados(); }
    if ( $idloja == "11") { $iploja  = "11"; $qtdpdv  = "18"; LoopDados(); }
    if ( $idloja == "12") { $iploja  = "12"; $qtdpdv  = "28"; LoopDados(); }
    if ( $idloja == "13") { echo ""; }
    if ( $idloja == "14") { echo ""; }
    if ( $idloja == "15") { echo ""; }
    if ( $idloja == "16") { $iploja  = "16"; $qtdpdv  = "12"; LoopDados(); }
    if ( $idloja == "17") { $iploja  = "17"; $qtdpdv  = "17"; LoopDados(); }
    if ( $idloja == "18") { echo ""; }
    if ( $idloja == "19") { $iploja  = "19"; $qtdpdv  = "14"; LoopDados(); }
    if ( $idloja == "20") { $iploja  = "20"; $qtdpdv  = "14"; LoopDados(); }
    if ( $idloja == "21") { $iploja  = "21"; $qtdpdv  = "18"; LoopDados(); }
    if ( $idloja == "22") { echo ""; }
}

$TimeStampF = shell_exec("date +'%a %d %b %H:%M:%S'");
echo "Relatório Finalizado em $TimeStampF";

?>
