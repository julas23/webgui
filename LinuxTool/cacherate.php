<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "cartaofidel"; 
$produto = $_POST ["produto"];
$error = error_get_last();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");
$query = "-- cache hit rates (should not be less than 0.99)
SELECT sum(heap_blks_read) as heap_read, sum(heap_blks_hit)  as heap_hit, (sum(heap_blks_hit) - sum(heap_blks_read)) / sum(heap_blks_hit) as ratio
FROM pg_statio_user_tables;"; 


$rs = pg_query($con, $query) or die("Nao foi possivel executar a query: <br><br> $query <br><br> $error");

echo "<table align=center><tr><td colspan=3><center><strong>Cache não pode ser menos que 0.99</strong></center></td></tr>";
while ($row = pg_fetch_row($rs)) {
  echo "
    <tr>
        <td width=180>Heap Blocks Read</td>
        <td width=180>Heap Blocks Hit</td>
        <td width=180>Heap Blocks Ratio</td>
    </tr>
    <tr>
        <td width=180>$row[0]</td>
        <td width=180>$row[1]</td>
        <td width=180>$row[2]</td>
    </tr>
    ";
}
echo "</table>";
pg_close($con); 

?>
