<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new>

<?php

include 'config.php';

$myusername = $_POST['username'];
$mypassword = $_POST['password'];
$ckpassword = $_POST['ckpassword'];
$error      = "";

global $myemail;
global $myusername;
global $mypassword;
global $ckpassword;
global $error;

if (!$connect){ $error = "<center>Impossível conectar.</center>"; }
else {
    $dbconn = mysql_select_db($dbname, $connect);
    if (!$dbconn){ $error = "<center>Erro ao conectar em <font color=red>$dbname</font></center>"; }
    else {

        $sql1 = "SELECT username FROM $dbtabl WHERE username = '$myusername';";
        $sql2 = "SELECT email FROM $dbtabl WHERE username = '$myusername';";
        $sql3 = "UPDATE admin SET passcode = '$mypassword' WHERE username = '$myusername'";

        $query1 = mysql_query($sql1);
        $query2 = mysql_query($sql2);
        $query3 = mysql_query($sql3);

        $result1 = mysql_num_rows($query1);
        $result2 = mysql_num_rows($query2);
        $result3 = mysql_num_rows($query3);

        if (!$result1) { $error = "<center><font color=red>Usuário não existe. <a href=registra.php>REGISTRAR</a></font></center>"; echo "<br><br>$error<br><br>"; }
        else {
            if (!$result2) { $error = "<center><font color=red>E-mail não corresponde. <a href=login.php>Tentar Novamente</a></font></center>"; echo "<br><br>$error<br><br>"; }
            else {
                echo "<br><br>Atualizando a senha de ".$myusername."<br><br>";
                mysql_query($sql3);
                header('location: login.php');
            }
        }
    }
}
?>
</body></html>
