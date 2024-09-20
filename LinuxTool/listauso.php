<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "postgres";
$error = error_get_last();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");
$query = "SELECT datname,usename,client_addr,client_port FROM pg_stat_activity order by client_addr"; 


$rs = pg_query($con, $query) or die("Nao foi possivel executar a query: <br><br> $query <br><br> $error");

echo "<table align=center border=0>";
echo "<tr><td colspan=3 align=center><h1>Conexões no Banco</h1></td></tr>";
echo "<tr><td><strong>Nome da Base</strong></td><td><strong>Usuário</strong></td><td><strong>IPs Origem</strong></td><td><strong>Porta Conectada</strong></td></tr>";


while ($row = pg_fetch_row($rs)) {
  echo "<tr>
            <td width=150>
                $row[0]
            </td>
            <td width=150>
                $row[1]
            </td>
            <td width=150>
                $row[2]
            </td>
            <td width=150>
                $row[3]
            </td>
        </tr>";
}

echo "</table>";

pg_close($con); 

?>
