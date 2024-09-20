<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new>

<?php

include 'config.php';

$myemail    = $_POST['email'];
$myusername = $_POST['username'];
$mypassword = $_POST['password'];
$ckpassword = $_POST['ckpassword'];
$error      = "";

global $myemail;
global $myusername;
global $mypassword;
global $ckpassword;
global $error;
global $timestamp;
global $ipaddress;

if (!$connect){ $error = "<center>Impossível conectar.</center>"; }
else {
    $dbconn = mysql_select_db($dbname, $connect);
    if (!$dbconn){ $error = "<center>Erro ao conectar em <font color=red>$dbname</font></center>"; }
    else {
        $sql = "SELECT username FROM $dbtabl WHERE username = '$myusername';";
        $queryO = mysql_query($sql);
        $result = mysql_num_rows($queryO);
        $queryI  = "INSERT INTO admin ( username, passcode, email, ipquandocriado, datacriado) VALUES ('$myusername',$mypassword,'$myemail','$ipaddress','$timestamp')";
        if (!$result) { $error = "<center><font color=red>Usuário não existe.</font></center>";
            echo "<br><br>Incluindo Usuário ".$myusername."<br><br>";
            mysql_query($queryI)or print("<center><font color=red>Impossível executar a query<br> $queryI</font></center>");
            echo "Verificando existência do usuário.";
            $sqlT = "SELECT username FROM $dbtabl WHERE username = '$myusername';";
            $queryT = mysql_query($sqlT);
            $resultT = mysql_num_rows($queryT);
            if (!$resultT) { echo "<center><font color=red>Usuário não foi criado. Redirecionando !!!</font></center>"; sleep(3); header('location: registra.php'); }
            else { echo "<center><font color=red>Usuário foi criado com êxito. Redirecionando !!!</font></center>"; sleep(3); header('location: login.php'); }
        }
        else { $error = "<center><font color=red>Usuário já existe!<br>Deseja <a href=recupera.php>RECUPERAR</a> acesso?</font></center>"; }
}   }

echo "<br><br>$error<br><br>";

?>
</body></html>
