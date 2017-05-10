

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="procs/enviarCorreo.proc.php">
<select name="mail_correu">
	
<?php 

include "conexio.php";

$sql = "SELECT * FROM tbl_usuari ORDER BY usu_tipus";
$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				while ($usu = mysqli_fetch_array($resultat)) {
					$correu = $usu['usu_mail'];
					$nom = $usu['usu_nom']." ".$usu['usu_cognoms'];
					echo "<option value='$correu'>$nom</option>";
				}
			}


 ?>
</select>
	Títol:<br>
	<input type="text" name="mail_asunto">
	Text: <br><textarea name="mail_missatge" style="min-width: 300px;min-height: 100px;"></textarea><br>
	<input type="submit" name="enviar" value="enviar">
</form>
</body>
</html>