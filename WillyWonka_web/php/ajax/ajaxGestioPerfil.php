<?php 
extract($_REQUEST);
include('../conexio.php');
switch ($decisio) {
	case 'afegirNen':
		echo "
			<form action='procs/afegirNen.proc.php'>
				<h3>Afegir un nou infant</h3>
				tutor1:
				<select name='usu_id1'>
			";

					$sql = "SELECT * FROM tbl_usuari where usu_tipus = 'tutor'";
					$resultats=mysqli_query($conexio, $sql);
					if (mysqli_num_rows($resultats) != 0 ) {
						while ($usuari = mysqli_fetch_array($resultats)) {
							$nom = $usuari['usu_nom'] . ' ' . $usuari['usu_cognoms'];
							echo "<option value='" . $usuari['usu_id'] . "'>$nom</option>";
						}
					}
				 echo "
				</select><br>
				tutor2:
				<select name='usu_id2'>";
					$resultats=mysqli_query($conexio, $sql);
					if (mysqli_num_rows($resultats) != 0 ) {
						while ($usuari = mysqli_fetch_array($resultats)) {
							$nom = $usuari['usu_nom'] . ' ' . $usuari['usu_cognoms'];
							echo "<option value='" . $usuari['usu_id'] . "'>$nom</option>";
						}
					}
				echo "
				</select><br>
				<input type='text' name='nen_nom' placeholder='Nom'><br>
				<input type='text' name='nen_cognoms' placeholder='Cognoms'><br>
				<input type='date' name='nen_data'><br>
				<input type='text' name='nen_alergies' placeholder='Alergies'><br>
				<input type='text' name='nen_trastorns' placeholder='Trastorns'><br>
				<input type='text' name='nen_malalties' placeholder='Malalties'><br>
				<input type='submit' name='ENVIAR' value='ENVIAR'>
			</form>
		";
		break;

	case 'afegirTutor':
		echo "
			<form action='procs/afegirTutor.proc.php'>
				<input type='text' name='usu_nom' placeholder='Nom'><br>
				<input type='text' name='usu_cognoms' placeholder='Cognoms'><br>
				<input type='text' name='usu_mail' placeholder='Correu'><br>
				<input type='password' name='usu_pass' placeholder='Contrasenya'><br>
				<input type='submit' name='ENVIAR'>
			</form>
		";
		break;

	case 'afegirMestre':
		echo "
			<form action='procs/afegirTutor.proc.php'>
				<input type='text' name='usu_nom' placeholder='Nom'><br>
				<input type='text' name='usu_cognoms' placeholder='Cognoms'><br>
				<input type='text' name='usu_mail' placeholder='Correu'><br>
				<input type='password' name='usu_pass' placeholder='Contrasenya'><br>
				<input type='submit' name='ENVIAR'>
			</form>
		";
		break;
	case 'afegirNen':
		echo "
			
		";
		break;

	case 'afegirNen':
		echo "
			
		";
		break;

	case 'afegirNen':
		echo "
			
		";
		break;

	case 'afegirNen':
		echo "
			
		";
		break;

	case 'afegirNen':
		echo "
			
		";
		break;

	case 'afegirNen':
		echo "
			
		";
		break;
	
	default:
		echo "Ups, hay un error interno.";
		break;
}


 ?>