<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "postgres";
$error = error_get_last();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");
$query = "SELECT sum(idx_blks_read) as idx_read, sum(idx_blks_hit)  as idx_hit, (sum(idx_blks_hit) - sum(idx_blks_read)) / sum(idx_blks_hit) as ratio
FROM pg_statio_user_indexes;"; 


$rs = pg_query($con, $query) or die("Nao foi possivel executar a query: <br><br> $query <br><br> $error");

echo "<table align=center border=0>";
echo "<tr><td colspan=3 align=center>Quantos Índices estão em Cache</td></tr>";
echo "<tr><td>Index Block Read</td><td>Index Blocks Hit</td><td>Index Block Ratio</td></tr>";
echo "<tr>";

while ($row = pg_fetch_row($rs)) {
  echo "<td width=150>
            $row[0]
        </td>
        <td width=150>
            $row[1]
        </td>
        <td width=150>
            $row[2]
        </td>";
}

echo "</tr>";

pg_close($con); 

?>
