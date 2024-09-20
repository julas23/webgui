<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "postgres";
$error = error_get_last();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");
$query = "SELECT pid, age(query_start, clock_timestamp()), usename, query 
FROM pg_stat_activity 
WHERE query != '<IDLE>' AND query NOT ILIKE '%pg_stat_activity%' 
ORDER BY query_start desc;"; 


$rs = pg_query($con, $query) or die("Nao foi possivel executar a query: <br><br> $query <br><br> $error");

while ($row = pg_fetch_row($rs)) {
  echo "
        $row[0]<br><br>
        $row[1]<br><br>
        $row[2]<br><br>
        $row[3]<br><br>
        $row[4]<br><br>
        $row[5]
        ";
}

pg_close($con); 

?>
