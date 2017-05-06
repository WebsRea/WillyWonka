<?php 
extract($_REQUEST);
include('../conexio.php');

	$sql = "SELECT * FROM tbl_nen WHERE nen_id = $id";
	$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><h1></tr>";
				while ($nen = mysqli_fetch_array($resultat)) {
					$id = $nen['nen_id'];
					echo "<tr><td>" . $nen['nen_nom'] . "</td><td>" . $nen['nen_cognoms'] . "</td></tr><br><br>";
				}
				echo "</table>";
				echo "
						<form action='procs/eliminarNen.proc.php'>
						<input type='hidden' name='id' value='$id'>
						<input type='submit' value='Eliminar'>
						</form>
					";
			}


 ?>