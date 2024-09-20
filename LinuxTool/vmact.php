<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new>

<?php

include 'config.php';

$username = $_GET['username'];
$server   = $_GET['server'];
$vmname   = $_GET['vmname'];
$func     = $_GET['func'];

$CMD = "ssh $username@$server 'xe vm-$func vm=$vmname force=true'";
echo $CMD;

$sql  = "INSERT INTO logs (nomeusuario, horaacesso, iporigem, comando) VALUES ('$username', '$timestamp', '$ipaddress', '$CMD')";
$query = mysql_query($sql);

?>

</body></html>
