<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "cartaofidel"; 
$produto = $_POST ["produto"];
$error = error_get_last();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");

$query = "select (limiteconvenio-limiteconvenioutilizado) as saldo from informacoesfinanceiras where codcli in (select codcli from clientes where RG like '%$produto%');"; 

$rs = pg_query($con, $query) or die("Nao foi possivel executar a query: <br><br> $query <br><br> $error");

while ($row = pg_fetch_row($rs)) {
  echo "Cartão: R$ $row[0] <br>";
}
echo "</tr></table>";
pg_close($con); 

?>
