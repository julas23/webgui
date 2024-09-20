<?php

$dbname = 'PDV';
$dbuser = 'root';
$dbpass = '';
$dbhost = '192.168.1.101';
$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Impossível conectar ao servidor '$dbhost'");
mysql_select_db($dbname) or die("Impossível abrir o banco '$dbname'");

$query = "select preco,datapreco,preco1,datapreco1,preco2,datapreco2 from T_Produtos where codbar = '9788600000705'";
$result = mysql_query($query);

while( $row = mysql_fetch_assoc( $result)){
    echo "<table align=center border=1>";
    echo "<tr>
            <td>Preço:</td>
            <td>Data Preço:</td>
            <td>Preço1:</td>
            <td>Data Preço1:</td>
            <td>Preço2</td>
            <td>Data Preço2:</td>
        </tr>";
    echo "<tr><td>$row[preco]</td><td>$row[datapreco]</td><td>$row[preco1]</td><td>$row[datapreco1]</td><td>$row[preco2]</td><td>$row[datapreco2]</td>";
}

mysql_close($dbname);
mysqli_close($connect);

?>
