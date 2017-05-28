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
						<div class='jumbotron frase'><h2 class='h2fam'>Estàs a punt de canviar la fitxa de:</h2></div>
						<form action='procs/editarNen.proc.php'>
						<div class='col-md-4'></div>
						<div class='col-md-4'>
							<div class='form-group'>
		                    	<label>Nom</label>
								<input type='text' name='nom' value='$nom' class='form-control'>
								<label>Cognoms</label>
								<input type='text' name='cognoms' value='$cognoms' class='form-control'>
								<label>Data naixament</label>
								<input type='date' name='data' value='$data' class='form-control'>
								<label>Al·lèrgies</label>
								<input type='text' name='al·lèrgies' value='$alergies' class='form-control'>
								<label>Trastorns</label>
								<input type='text' name='trastorns' value='$trastorns' class='form-control'>
								<label>Malalties</label>
								<input type='text' name='malalties' value='$malalties' class='form-control'>
								<input type='hidden' name='id' value='$id'> 
								<input type='submit' value='Modificar' class='btn btn-willy text-center btn-lg'>
							</div>
						</div> 
					";

					// $sqlUpdate = "UPDATE `tbl_nen` SET `nen_nom` = '$nom', `nen_cognoms` = '$cognoms', `nen_data_naixement` = '$data', `nen_alergies` = '$alergies', `nen_trastorns` = '$trastorns', `nen_malaltia` = '$malalties' WHERE `tbl_nen`.`nen_id` = $id;"
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}

 ?>