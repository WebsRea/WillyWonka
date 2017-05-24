<?php 
	if (isset($_SESSION['usu_tipus']) AND $_SESSION['usu_tipus'] == 'mestre') {



	$ini = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
	// $ini = $any . "-" . $mesProx."-".$dia;
	$fi = date("Y-m-d-");
							//echo "hasta aquí llega";
	$usu_id = $_SESSION['usu_id'];
	$sql="SELECT * FROM tbl_usuari where usu_id = $usu_id";
								
		$results=mysqli_query($conexio,$sql);
		if (mysqli_num_rows($results) != 0){
			while ($usu = mysqli_fetch_array($results)) {
				$cla_id = $usu['cla_id'];
				if (isset($cla_id)) {
				$sqlB="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= NOW() + INTERVAL 1 WEEK AND act_data_fi >= NOW() + INTERVAL 1 WEEK AND cla_id = $cla_id ORDER BY act_data_ini DESC"; 
					// $sql="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= (NOW() + INTERVAL 1 WEEK) AND act_data_fi >= (NOW() + INTERVAL 1 WEEK) AND cla_id = 1 ORDER BY act_data_ini DESC"; 
					
					$resultsB=mysqli_query($conexio,$sqlB);
					if ($row = mysqli_fetch_array($resultsB)){ 

					   echo "<table border = '1'> \n"; 
					   echo "<tr><td>Titol</td><td>Descripció</td><td>Data Inicial</td><td>Data Final</td></tr> \n"; 
					   do { 
					      echo "<tr><td>".$row["act_titol"]."</td><td>".$row["act_text"]."</td><td>".$row["act_data_ini"]."</td><td>".$row["act_data_fi"]."</td></tr> \n"; 
					   } while ($row = mysqli_fetch_array($results)); 
					   echo "</table> \n"; 
					} else { 
					echo "<img src='../img/icon/001-sad.png'> No hi ha cap registre!"; 
					} 
				}else { 
					echo "<img src='../img/icon/001-sad.png'> Aquest usuari no te cap classe asignada!"; 
					} 
				}
			}
		
	}else{

	// session_start();
	// echo "estoy en veure activitats";
	// include('conexio.php');
	$ini = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
	// $ini = $any . "-" . $mesProx."-".$dia;
	$fi = date("Y-m-d-");
							//echo "hasta aquí llega";
	$usu_id = $_SESSION['usu_id'];
	$sql="SELECT * FROM tbl_familia where (usu_id1 = $usu_id OR usu_id2 = $usu_id)";
								
		$results=mysqli_query($conexio,$sql);
		if (mysqli_num_rows($results) != 0){
			while ($usu = mysqli_fetch_array($results)) {
				$fam_id = $usu['fam_id'];
				$sqlN="SELECT * FROM tbl_nen where  fam_id = $fam_id";
				$resultsN=mysqli_query($conexio,$sqlN);
				if (mysqli_num_rows($resultsN) != 0){
					while ($nen2 = mysqli_fetch_array($resultsN)) {
						$nom = $nen2['nen_nom'];
						echo "Activitats de: $nom";
						$cla_id = $nen2['cla_id'];
						$sql="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= NOW() + INTERVAL 1 WEEK AND act_data_fi >= NOW() + INTERVAL 1 WEEK ORDER BY act_data_ini DESC"; 
							// $sql="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= (NOW() + INTERVAL 1 WEEK) AND act_data_fi >= (NOW() + INTERVAL 1 WEEK) AND cla_id = 1 ORDER BY act_data_ini DESC"; 
							
							$results=mysqli_query($conexio,$sql);
							if ($row = mysqli_fetch_array($results)){ 

							   echo "<table border = '1'> \n"; 
							   echo "<tr><td>Titol</td><td>Descripció</td><td>Data Inicial</td><td>Data Final</td></tr> \n"; 
							   do { 
							      echo "<tr><td>".$row["act_titol"]."</td><td>".$row["act_text"]."</td><td>".$row["act_data_ini"]."</td><td>".$row["act_data_fi"]."</td></tr> \n"; 
							   } while ($row = mysqli_fetch_array($results)); 
							   echo "</table> \n"; 
							} else { 
							echo "<img src='../img/icon/001-sad.png'> No hi ha cap registre!"; 
							} 
						}
					}
				}
			}		

	}



 ?>