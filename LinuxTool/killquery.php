<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "postgres";
$error = error_get_last();
$pidquery = $_POST ["pidquery"];
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");
$query = "SELECT pg_terminate_backend($pidquery);"; 


$rs = pg_query($con, $query) or die("Nao foi possivel eliminar a query: <br><br> $query <br><br> $error");

while ($row = pg_fetch_row($rs)) {
  echo "$row[0] $row[1] $row[2]";
}

pg_close($con); 

?>
