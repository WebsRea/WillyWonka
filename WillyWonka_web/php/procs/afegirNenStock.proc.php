<?php 
	
	extract($_REQUEST);
	
	echo "$usu_id1-----$usu_id2-----$nen_nom-----$nen_cognoms-----$nen_alergies-----$nen_trastorns";

	include('../conexio.php');

					$sql = "SELECT * FROM `tbl_familia` WHERE (usu_id1 = '2' OR usu_id1 = '3') AND(usu_id2 = '2' OR usu_id2 = '3')";
					$resultats=mysqli_query($conexio, $sql);
					if (mysqli_num_rows($resultats) == 0 ) {
						$sqlInsertarFamilias = "INSERT INTO `tbl_familia` (`fam_id`, `usu_id1`, `usu_id2`, `fam_estat`) VALUES (NULL, '$usu_id1', '$usu_id2', 'actiu');";
						mysqli_query($conexio, $sqlInsertarFamilias);
						$fam_id = mysqli_insert_id($conexio);
					}else{
						while ($familia = mysqli_fetch_array($resultats)) {
							$fam_id = $familia['fam_id'];
						}
					}
					$sql = "INSERT INTO `tbl_nen` (`nen_id`, `nen_nom`, `nen_cognoms`, `nen_data_naixement`, `nen_alergies`, `nen_trastorns`, `nen_malaltia`, `fam_id`, `obs_id`, `cla_id`) VALUES (NULL, '$nen_nom', '$nen_cognoms', '$nen_data', '$nen_alergies', '$nen_trastorns', '$nen_malalties', '$fam_id', NULL , NULL);";
				echo "$sql";
					mysqli_query($conexio, $sql);

					header('Location:../gestioPerfils.php');
					// header('Location:../gestioPerfils.php');

 ?>