<?php //NO OLVIDARSE DE PONER SESIONES!!!
session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form name="anadirEvento" action="procs/afegirEsdeveniment.proc.php">
		Nom de l'esdeveniment:
		<input type="textArea" name="esd_titol"><br><br>
		Descripció:<br>
		<textarea name="esd_text" maxlength="500"></textarea><br><br>
		Dia de l'event:
		<input type="date" name="esd_data"><br><br>
		<input type="submit" name="enviar">
	</form>
</body>
</html>