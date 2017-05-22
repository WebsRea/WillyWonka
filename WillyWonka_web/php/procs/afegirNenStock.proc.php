<?php 
	
	extract($_REQUEST);
	
	echo "$usu_id1-----$usu_id2-----$nen_nom-----$nen_cognoms-----$nen_alergies-----$nen_trastorns";

	include('../conexio.php');

					$sql = "SELECT * FROM `tbl_familia` WHERE (usu_id1 = '$usu_id1' OR usu_id1 = 'usu_id2') AND(usu_id2 = 'usu_id2' OR usu_id2 = 'usu_id1')";
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

					$nen_id = mysqli_insert_id($conexio);

					$sqlStock = "SELECT * FROM tbl_stock";
					$resultatStock=mysqli_query($conexio, $sqlStock);
					if (mysqli_num_rows($resultatStock) != 0 ) {
						while ($stock = mysqli_fetch_array($resultatStock)) {
							$stock_id = $stock['sto_id'];
							echo "Lo hace";
							$insertStockNen = "INSERT INTO `tbl_stock_nen` (`stonen_id`, `sto_id`, `nen_id`, `stonen_quantitat`) VALUES (NULL, '$stock_id', '$nen_id', 'ple')";
							mysqli_query($conexio, $insertStockNen);
						}
					}


					header('Location:../gestioPerfils.php');
					// header('Location:../gestioPerfils.php');

 ?>