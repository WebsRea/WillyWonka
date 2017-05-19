<?php 
extract($_REQUEST);
include('../conexio.php');

	$sql = "SELECT * FROM tbl_usuari WHERE usu_id = $id";
	$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<div class='jumbotron frase h2fam'>Estàs a punt d'eliminar aquest usuari:</div><table class='table table-hover'><tr class='datos_tabla'><th>Nom</th><th>Cognom</th></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr class='table table-hover'><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td></tr><br><br>";
				}
				echo "</table>";
				echo "
						<form action='procs/eliminarUsu.proc.php'>
						<input type='hidden' name='id' value='$id'>
						<input type='submit' value='Eliminar' class='btn btn-willy'>
						</form>
						<br>
					";
			}


 ?>