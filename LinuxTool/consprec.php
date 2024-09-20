<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "erp"; 
$produto = $_POST ["produto"];
$error = error_get_last();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");

$query = "select datamovimento,idestabelecimento as loja,idproduto,codigobarras,precovenda,saldoatual,digitoverificador from precovendaprodutopdv where idproduto=$produto and datamovimento=CURRENT_DATE"; 

$rs = pg_query($con, $query) or die("Nao foi possivel executar a query: <br><br> $query <br><br> $error");

echo "
    <font face='sans-serif' size='10' color='red'>
    <table border=0 align=center>
        <tr>
            <td width=190 align=left><strong>Data do Movimento</strong></td>
            <td width=95 align=center><strong>Loja</strong></td>
            <td width=115 align=left><strong>Id Produto</strong></td>
            <td width=170 align=left><strong>Codigo de Barras</strong></td>
            <td width=120 align=left><strong>Preco Venda</strong></td>
            <td width=120 align=left><strong>Saldo Atual</strong></td>
            <td width=170 align=center><strong>Digito Verificador</strong></td>
        </tr>
    </font>";

while ($row = pg_fetch_row($rs)) {
  echo "<font face='sans-serif' size='8'>
        <tr>
            <td width=190 align=left>$row[0]</td>
            <td width=95 align=center>$row[1]</td>
            <td width=115 align=left>$row[2]</td>
            <td width=170 align=left>$row[3]</td>
            <td width=120 align=left>$row[4]</td>
            <td width=120 align=left>$row[5]</td>
            <td width=170 align=center>$row[6]</td>
        </tr>
        </font>";

}
echo "</table>";
pg_close($con); 

?>
