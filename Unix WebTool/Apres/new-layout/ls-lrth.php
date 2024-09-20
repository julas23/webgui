<?php
$comando = 'ls -lrth';
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
<textarea rows="30" cols="120">
<?php
	echo $resultado;
?>
</textarea>
</center>
</body>