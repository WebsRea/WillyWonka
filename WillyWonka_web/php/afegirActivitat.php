<?php //NO OLVIDARSE DE PONER SESIONES!!!
session_start(); 
$usu_id = $_SESSION['usu_id'];
// echo "$usu_id";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form name="anadirEvento" action="procs/afegirActivitat.proc.php">
		Nom de la activitat:
		<input type="textArea" name="act_titol"><br><br>
		Descripció:<br>
		<textarea name="act_text" maxlength="500"></textarea><br><br>
		Dia de l'activitat':
		<input type="date" name="act_data"><br><br>
		<input type="submit" name="enviar">
	</form>
</body>
</html>