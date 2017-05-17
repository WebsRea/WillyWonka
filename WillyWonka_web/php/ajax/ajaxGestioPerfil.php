<?php 
extract($_REQUEST);
include('../conexio.php');
switch ($decisio) {
	case 'afegirNen':
		echo "
			<div class='col-md-12'>
			<h2 class='h2admin'>AFEGIR UN NOU INFANT</h2>
			<div class='jumbotron frase'>
			<p>Recorda que per introduir un nen nou has d'haver introduit primer els seus familiars.</p>
			</div>
			
			<form action='procs/afegirNen.proc.php'>
				<div class='col-md-4'>
				<label>Primer Familiar</label>
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
				</select>
				</div>
				<div class='col-md-4'>
				<label>Segon Familiar</label>
				<select name='usu_id2'>";
					$resultats=mysqli_query($conexio, $sql);
					if (mysqli_num_rows($resultats) != 0 ) {
						while ($usuari = mysqli_fetch_array($resultats)) {
							$nom = $usuari['usu_nom'] . ' ' . $usuari['usu_cognoms'];
							echo "<option value='" . $usuari['usu_id'] . "'>$nom</option>";
						}
					}
				echo "
				</select>
				</div>
				<div class='col-md-4'></div>
				<div class='col-md-12 margen_arriba'>
					<input type='text' name='nen_nom' placeholder='Nom' class='margen_derecho'> 
					<input type='text' name='nen_cognoms' placeholder='Cognoms' class='margen_derecho'>
					<input type='date' name='nen_data'>
				</div>
				<div class='col-md-12 margen_arriba'>
				<input type='text' name='nen_alergies' placeholder='Alergies'>
				<input type='text' name='nen_trastorns' placeholder='Trastorns'>
				<input type='text' name='nen_malalties' placeholder='Malalties'>
				</div>
				<div class='col-md-12 margen_arriba'>
				<input type='submit' name='ENVIAR' value='ENVIAR'>
				</div>
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