<?php 
extract($_REQUEST);
include('../conexio.php');

	$sql = "SELECT * FROM tbl_nen WHERE nen_id = $id";
	$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table class='table table-hover'><tr class='datos_tabla'><th>Nom</th><th>Cognom</th></tr>";
				while ($nen = mysqli_fetch_array($resultat)) {
					$id = $nen['nen_id'];
					echo "<tr class='table table-hover'><td>" . $nen['nen_nom'] . "</td><td>" . $nen['nen_cognoms'] . "</td></tr><";
				}
				echo "</table>";
				echo "
						<form action='procs/eliminarNen.proc.php'>
						<div class='col-md-4'></div>
						<div class='col-md-4'>
							<input type='hidden' name='id' value='$id'>
							<input type='submit' value='Eliminar' class='btn btn-willy'>
						</div>
						<br>
						</form>
					";
			}


 ?>