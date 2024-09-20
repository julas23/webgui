<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "postgres";
$error = error_get_last();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");
$query = "select * from pg_stat_activity where state != 'idle';"; 


$rs = pg_query($con, $query) or die("Nao foi possivel executar a query: <br><br> $query <br><br> $error");

echo "Lista de PIDs de Queries em IDLE STATE<br><br>";

while ($row = pg_fetch_row($rs)) {
  echo "$row[0] $row[1] <br>";
}

pg_close($con); 

?>
