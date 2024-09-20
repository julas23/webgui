<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new>
<?php

// ############################################
// Início do conjunto de saída para o banco Venda

echo "<table border=0 align=center>";
        echo "<tr><td align=center width=550><h3>Banco Master</h3></td><td align=center width=550><h3>Banco Slave</h3></td></tr>";
        echo "<tr><td>";
        echo "<table border=1 align=center width=550><tr><td>";

            // ############################################
            // Início do conjunto de saída para o banco Venda

            $host1 = "192.168.1.4";
            $db1 = "venda";
            $user = "postgres";
            $pass = "postgres";
            $DATAANT = $_POST ["dtanterior"];
            $error = error_get_last();
            $con1 = pg_connect("host=$host1 dbname=$db1 user=$user password=$pass") or die ("Impossivel conectar ao Banco: $db1");

            $qrBV1 = "select count(*) from T_Venda"; 
            $qrBV2 = "select count(*) from T_Venda where datafiscal = '$DATAANT'"; 

            $rsBV1 = pg_query($con1, $qrBV1) or die ("Nao foi possivel executar a query: <br> $qrBV1 <br> $error");
            while($row=pg_fetch_row($rsBV1)){echo "Venda, Tabela T_Venda Total: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div><br>";}

            $rsBV2 = pg_query($con1, $qrBV2) or die ("Nao foi possivel executar a query: <br> $qrBV2 <br> $error");
            while($row=pg_fetch_row($rsBV2)){echo "Venda, Tabela T_Venda Ontem: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div>";}

            pg_close($con1);


        echo "</td></tr>";
        echo "<tr><td>";


            // ############################################
            // Início do conjunto de saída para o banco ERP

            $host1 = "192.168.1.4";
            $db2 = "erp";
            $user = "postgres";
            $pass = "postgres";
            $con2 = pg_connect("host=$host1 dbname=$db2 user=$user password=$pass") or die ("Impossivel conectar ao Banco: $db2");

            $qrBE1 = "select count(*) from itensnotasfiscais";
            $qrBE2 = "select count(*) from itensnotafiscaleletronica";

            $rsBE1 = pg_query($con2, $qrBE1) or die ("Nao foi possivel executar a query: <br> $qrBE1 <br> $error");
            $rsBE2 = pg_query($con2, $qrBE2) or die ("Nao foi possivel executar a query: <br> $qrBE2 <br> $error");

            $rsBE1 = pg_query($con2, $qrBE1) or die ("Nao foi possivel executar a query: <br> $qrBE1 <br> $error");
            while($row=pg_fetch_row($rsBE1)){echo "ERP - Itens NF: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div><br>";}

            $rsBE2 = pg_query($con2, $qrBE2) or die ("Nao foi possivel executar a query: <br> $qrBE2 <br> $error");
            while($row=pg_fetch_row($rsBE2)){echo "ERP - Itens NFe: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div>";}

            pg_close($con2);


        echo "</td></tr>";
        echo "<tr><td>";


            // ############################################
            // Início do conjunto de saída para o banco Cartão Fidelidade

            $host1 = "192.168.1.4";
            $db3 = "cartaofidel";
            $user = "postgres";
            $pass = "postgres";
            $con3 = pg_connect("host=$host1 dbname=$db3 user=$user password=$pass") or die ("Impossivel conectar ao Banco: $bd3");

            $qrBCF = "select count(*) from transconvenio";

            $rsBCF = pg_query($con3, $qrBCF) or die ("Nao foi possivel executar a query: <br> $qrBCF <br> $error");

            while($row=pg_fetch_row($rsBCF)){echo "Cartão Fidelidade, Tabela transconvenio: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div><br>";}

            pg_close($con3);


        echo "</td></tr>";
        echo "</table>";
    echo "</td><td>";
        echo "<table border=1 align=center width=550><tr><td>";


            // ############################################
            // Início do conjunto de saída para o banco Venda

            $host2 = "192.168.1.23";
            $db1 = "venda";
            $user = "postgres";
            $pass = "postgres";
            $DATAANT = $_POST ["dtanterior"];
            $con4 = pg_connect("host=$host2 dbname=$db1 user=$user password=$pass") or die ("Impossivel conectar ao Banco: $db1");

            $qrBV1 = "select count(*) from T_Venda";
            $qrBV2 = "select count(*) from T_Venda where datafiscal = '$DATAANT'";

            $rsBV1 = pg_query($con4, $qrBV1) or die ("Nao foi possivel executar a query: <br> $qrBV1 <br> $error");
            while($row=pg_fetch_row($rsBV1)){echo "Venda, Tabela T_Venda Total: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div><br>";}

            $rsBV2 = pg_query($con4, $qrBV2) or die ("Nao foi possivel executar a query: <br> $qrBV2 <br> $error");
            while($row=pg_fetch_row($rsBV2)){echo "Venda Tabela T_Venda Ontem: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div>";}

            pg_close($con4);


            echo "</td></tr>";
            echo "<tr><td>";


            // ############################################
            // Início do conjunto de saída para o banco ERP

            $host2 = "192.168.1.23";
            $db2 = "erp";
            $user = "postgres";
            $pass = "postgres";
            $con5 = pg_connect("host=$host2 dbname=$db2 user=$user password=$pass") or die ("Impossivel conectar ao Banco: $db2");

            $qrBE1 = "select count(*) from itensnotasfiscais";
            $qrBE2 = "select count(*) from itensnotafiscaleletronica";

            $rsBE1 = pg_query($con5, $qrBE1) or die ("Nao foi possivel executar a query: <br> $qrBE1 <br> $error");
            $rsBE2 = pg_query($con5, $qrBE2) or die ("Nao foi possivel executar a query: <br> $qrBE2 <br> $error");

            $rsBE1 = pg_query($con5, $qrBE1) or die ("Nao foi possivel executar a query: <br> $qrBE1 <br> $error");
            while($row=pg_fetch_row($rsBE1)){echo "ERP - Itens NF: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div><br>";}

            $rsBE2 = pg_query($con5, $qrBE2) or die ("Nao foi possivel executar a query: <br> $qrBE2 <br> $error");
            while($row=pg_fetch_row($rsBE2)){echo "ERP - Itens NFe: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div>";}

            pg_close($con5);


            echo "</td></tr>";
            echo "<tr><td>";


            // ############################################
            // Início do conjunto de saída para o banco Cartão Fidelidade

            $host2 = "192.168.1.4";
            $db3 = "cartaofidel";
            $user = "postgres";
            $pass = "postgres";
            $con6 = pg_connect("host=$host2 dbname=$db3 user=$user password=$pass") or die ("Impossivel conectar ao Banco: $db3");

            $qrBCF = "select count(*) from transconvenio";

            $rsBCF = pg_query($con6, $qrBCF) or die ("Nao foi possivel executar a query: <br> $qrBCF <br> $error");

            while($row=pg_fetch_row($rsBCF)){echo "Cartão Fidelidade, Transconvênio: <div style='float:right;display:inline-block';><strong>$row[0]</strong></div><br>";}

            pg_close($con6);


            echo "</td></tr>";
        echo "</table>";
    echo "</td>";
echo "</tr></table>";

    $con = pg_connect("host=192.168.1.23 dbname=postgres user=postgres password=postgres") or die ("Impossivel conectar ao Banco: postgres");
    $qrTS = "select now() - pg_last_xact_replay_timestamp() AS time_lag";
    $rsTS = pg_query($con, $qrTS) or die ("Nao foi possivel executar a query: <br> $qrTS <br> $error");
    while($row=pg_fetch_row($rsTS)) {
        if (strpos($row[0], "00:00:") !== false) { echo "<center>Sync OK! - ".$row[0]."</center>"; }
        else {
            echo "<table border=0 align=center><tr><td align=right>";
            echo "<h1>ANTENÇÃO!!!</h1></td><td colspan=2><h2>Sync não está em conformidade.</h2></td></tr>";
            echo "<tr><td align=right><h3>Atraso de</h3></td>";
            echo "<td align=right><h3>".$row[0]."</h3></td><td align=left><h3>Horas</h3></td>";
            echo "</tr></table>";
        }
    }
    pg_close($con);

?>
</body></html>
