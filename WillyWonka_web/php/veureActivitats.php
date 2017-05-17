<?php session_start();
	include('conexio.php');
	$ini = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
	// $ini = $any . "-" . $mesProx."-".$dia;
	$fi = date("Y-m-d-");
	$usu_id = $_SESSION['usu_id'];
	$sql="SELECT * FROM tbl_familia where (usu_id1 = $usu_id OR usu_id2 = $usu_id)";
								echo "$usu_id";
		$results=mysqli_query($conexio,$sql);
		if (mysqli_num_rows($results) != 0){
			while ($usu = mysqli_fetch_array($results)) {
				$fam_id = $usu['fam_id'];
				$sqlN="SELECT * FROM tbl_nen where  fam_id = $fam_id";
				$resultsN=mysqli_query($conexio,$sqlN);
				if (mysqli_num_rows($resultsN) != 0){
					while ($nen2 = mysqli_fetch_array($resultsN)) {
						$nom = $nen2['nen_nom'];
						$cla_id = $nen2['cla_id'];
						$sqlU="SELECT * FROM tbl_usuari where cla_id = $cla_id";
						$resultsU=mysqli_query($conexio,$sqlU);
						if (mysqli_num_rows($resultsU) != 0){
							while ($usu2 = mysqli_fetch_array($resultsU)) {
								$usu_id = $usu2['usu_id'];
									// $semana = date("Y-".("m"+1)."-d");
									// echo "$ini";

									$sql="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= NOW() + INTERVAL 1 WEEK AND act_data_fin >= NOW() + INTERVAL 1 WEEK ORDER BY act_data_ini DESC"; 
									$results=mysqli_query($conexio,$sql);
									if ($row = mysqli_fetch_array($results)){ 
									   echo "<table border = '1'> \n"; 
									   echo "<tr><td>Titol</td><td>Descripció</td><td>Data Inicial</td><td>Data Final</td></tr> \n"; 
									   do { 
									      echo "<tr><td>".$row["act_titol"]."</td><td>".$row["act_text"]."</td><td>".$row["act_data_ini"]."</td><td>".$row["act_data_fin"]."</td></tr> \n"; 
									   } while ($row = mysqli_fetch_array($results)); 
									   echo "</table> \n"; 
									} else { 
									echo "¡ No se ha encontrado ningún registro !"; 
									} 




							}
						}
					}
				}	
			}
		}


	
	
 ?>