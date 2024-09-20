<?php
$comando = 'nohup ./webshell/webshell.py --ssl-disable & > runwebshellout.log';
$resultado = shell_exec("$comando");
?>

<style type="text/css" rel="stylesheet">
   body{
   font-family: sans-serif;
   text-align: center;
   font-size:10px;
   color:grey;
   text-decoration:none;
}
</style>
<body>
<form name="form1" action="command.php" method="POST">
</form>
<center>
<textarea rows="48" cols="175">
<?php
	echo $resultado;
?>
</textarea>
</center>
</body>
