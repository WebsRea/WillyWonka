<?php //NO OLVIDARSE DE PONER SESIONES!!!
session_start(); 
$usu_id = $_SESSION['usu_id'];
echo "$usu_id";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form name="anadirEvento" action="procs/afegirFrase.proc.php">
		Frase:
		<input type="textArea" name="frase_text"><br><br>
		<input type="submit" name="enviar">
	</form>
</body>
</html>