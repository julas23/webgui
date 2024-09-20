<?php 

$host = "192.168.1.4"; 
$user = "postgres"; 
$pass = "postgres"; 
$db = "cotepe"; 
$DATAi = $_POST ["datai"];
$DATAf = $_POST ["dataf"];
$error = error_get_last();
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Impossivel conectar ao Banco: ". $error['message']. "\n");
$query = "select arq.cnpj,datainicioemissao,coo,valortotalliquido,cpfcnpj
	from registroe14 r14
	inner join arquivo arq on (arq.id=r14.idarquivo)
	where datainicioemissao >= '$DATAi' and datainicioemissao <= '$DATAf'
	and cpfcnpj = '00000000000000'
	order by valortotalliquido desc
	limit 60000";

$rs = pg_query($con, $query) or die("Nao foi possivel executar a query: <br><br> $query <br><br> $error");

echo "<table border=1 align=center>";
echo "<tr>
        <td align=center width=150><strong>CNPJ da Loja</strong></d>
        <td align=center width=150><strong>DATA</strong></d>
        <td align=center width=150><strong>COO</strong></d>
        <td align=center width=150><strong>VALOR</strong></d>
        <td align=center width=150><strong>CPF/CNPJ</strong></d>
";

while ($row = pg_fetch_row($rs)) {
  echo "<font face='sans-serif' size='4'>
        <tr>
            <td align=center width=150>$row[0]</td>
            <td align=center width=150>$row[1]</td>
            <td align=center width=150>$row[2]</td>
            <td align=center width=150>R$ $row[3]</td>
            <td align=center width=150>$row[4]</td>
        </tr></font>";
}
echo "</table>";
pg_close($con); 

?>
