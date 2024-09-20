<?php

$LsUpDt = shell_exec("/var/www/html/scripts/BP-lastlog.sh &");
$StRoti = shell_exec("cat /var/www/html/log/stdout.log");

?>
