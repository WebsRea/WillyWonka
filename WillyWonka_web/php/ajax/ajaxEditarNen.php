<?php 

extract($_REQUEST);
include('../conexio.php');


$sql = "SELECT * FROM tbl_nen WHERE nen_id = $id";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				while ($nen = mysqli_fetch_array($resultat)) {
					$nom = $nen['nen_nom'];
					$cognoms = $nen['nen_cognoms'];
					$data = $nen['nen_data_naixement'];
					$alergies = $nen['nen_alergies'];
					$trastorns = $nen['nen_trastorns'];
					$malalties = $nen['nen_malaltia'];
					echo "
						<form action='procs/editarNen.proc.php'><br><br>
						nom:
						<input type='text' name='nom' value='$nom'><br>
						cognoms:
						<input type='text' name='cognoms' value='$cognoms'><br>
						Data naixament
						<input type='date' name='data' value='$data'><br>
						alergies:
						<input type='text' name='alergies' value='$alergies'><br>
						trastorns:
						<input type='text' name='trastorns' value='$trastorns'><br>
						malalties:
						<input type='text' name='malalties' value='$malalties'><br>
						<input type='hidden' name='id' value='$id'><br>
						<input type='submit' value='Modificar'>
					";


					// $sqlUpdate = "UPDATE `tbl_nen` SET `nen_nom` = '$nom', `nen_cognoms` = '$cognoms', `nen_data_naixement` = '$data', `nen_alergies` = '$alergies', `nen_trastorns` = '$trastorns', `nen_malaltia` = '$malalties' WHERE `tbl_nen`.`nen_id` = $id;"
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}

 ?>