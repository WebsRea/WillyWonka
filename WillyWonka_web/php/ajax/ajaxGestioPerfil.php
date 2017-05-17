<?php 
extract($_REQUEST);
include('../conexio.php');
switch ($decisio) {
	case 'afegirNen':
		echo "
			<div class='col-md-12'>
			<h2 class='h2admin'>Afegir un nou infant</h2>
			<p></p>
			<form action='procs/afegirNen.proc.php'>
				
				familiar1:
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
				familiar2:
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
			</div>
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
			<form action='procs/afegirMestre.proc.php'>
				<input type='text' name='usu_nom' placeholder='Nom'><br>
				<input type='text' name='usu_cognoms' placeholder='Cognoms'><br>
				<input type='text' name='usu_mail' placeholder='Correu'><br>
				<input type='password' name='usu_pass' placeholder='Contrasenya'><br>
				<input type='submit' name='ENVIAR'>
			</form>
		";
		break;
	case 'editarNen':
		echo "
			Buscar:
			<input type='text' id='buscador' onkeyup='buscador1()'>
			<input type='hidden' id='decisio' value='$decisio'>
			<div id='resultadosBusqueda'></div>
			<div id='editarPerfil'></div>
		";
		break;

	case 'editarTutor':
		echo "
			Buscar:
			<input type='text' id='buscador' onkeyup='buscador1()'>
			<input type='hidden' id='decisio' value='$decisio'>
			<div id='resultadosBusqueda'></div>	
			<div id='editarPerfil'></div>
		";
		break;

	case 'editarMestre':
		echo "
			Buscar:
			<input type='text' id='buscador' onkeyup='buscador1()'>
			<input type='hidden' id='decisio' value='$decisio'>
			<div id='resultadosBusqueda'></div>
			<div id='editarPerfil'></div>
		";
		break;

	case 'eliminaNen':
		echo "
			Buscar:
			<input type='text' id='buscador' onkeyup='buscador1()'>
			<input type='hidden' id='decisio' value='$decisio'>
			<div id='resultadosBusqueda'></div>
			<div id='eliminarPerfil'></div>
		";
		break;

	case 'eliminaTutor':
		echo "
			Buscar:
			<input type='text' id='buscador' onkeyup='buscador1()'>
			<input type='hidden' id='decisio' value='$decisio'>
			<div id='resultadosBusqueda'></div>
			<div id='eliminarPerfil'></div>
		";
		break;

	case 'eliminaMestre':
		echo "
			Buscar:
			<input type='text' id='buscador' onkeyup='buscador1()'>
			<input type='hidden' id='decisio' value='$decisio'>
			<div id='resultadosBusqueda'></div>
			<div id='eliminarPerfil'></div>
		";
		break;
	
	default:
		echo "Ups, hay un error interno.";
		break;
}


 ?>