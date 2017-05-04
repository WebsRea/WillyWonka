<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action='procs/afegirNen.proc.php'>
	<h3>Afegir un nou infant</h3>
	tutor1:
	<select name='usu_id1'>
	<?php 
		include('conexio.php');

		$sql = 'SELECT * FROM tbl_usuari where usu_tipus = \'tutor\'';

		$resultats=mysqli_query($conexio, $sql);
					// echo "foisndfuignfdiuog";
		if (mysqli_num_rows($resultats) != 0 ) {
			while ($usuari = mysqli_fetch_array($resultats)) {
				$nom = $usuari['usu_nom'] . ' ' . $usuari['cognoms'];
				echo '<option value=' . $usuari['usu_id'] . '>$nom</option>';
			}
		}
	 ?>
	</select>
	tutor2:
	<select name='usu_id1'>
	<?php 
		include('conexio.php');

		$sql = 'SELECT * FROM tbl_usuari where usu_tipus = \'tutor\'';

		$resultats=mysqli_query($conexio, $sql);
					// echo "foisndfuignfdiuog";
		if (mysqli_num_rows($resultats) != 0 ) {
			while ($usuari = mysqli_fetch_array($resultats)) {
				$nom = $usuari['usu_nom'] . ' ' . $usuari['cognoms'];
				echo '<option value=' . $usuari['usu_id'] . '>$nom</option>';
			}
		}
	 ?>
	</select>
	<input type='text' name='nen_nom' placeholder='Nom'>
	<input type='text' name='nen_cognoms' placeholder='Cognoms'>
	<input type='text' name='nen_alergies' placeholder='Alergies'>
	<input type='text' name='nen_trastorns' placeholder='Trastorns'>
	<input type='submit' name='ENVIAR' value='ENVIAR'>
</form>

</body>
</html>