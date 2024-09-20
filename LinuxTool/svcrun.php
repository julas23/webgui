<html><head><link href="img/style.css" rel="stylesheet" /></head><body font=courier-new>
<?php

$username = $_GET['username'];
$server   = $_GET['server'];
$func     = $_GET['func'];
$svctgt   = $_GET['svctgt'];

echo "ssh $username@$server 'systemctl $func $svctgt'";
//shell_exec("$username@$server 'systemctl $func $svctgt'");

?>
</body></html>
