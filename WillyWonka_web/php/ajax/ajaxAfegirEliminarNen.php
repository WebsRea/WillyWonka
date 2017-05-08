<?php
include('../conexio.php');
extract($_REQUEST);
echo "$idNen ----- $idClasse";
	
	$sql = "SELECT * FROM tbl_nen WHERE cla_id IS NULL AND nen_id = $idNen";
	//echo $sql;
	$resultat=mysqli_query($conexio, $sql);
				// echo "foisndfuignfdiuog";
	if (mysqli_num_rows($resultat) != 0 ) {
		$sql = "UPDATE `tbl_nen` SET `cla_id` = $idClasse WHERE `tbl_nen`.`nen_id` = $idNen;";
	} else {
		$sql = "UPDATE `tbl_nen` SET `cla_id` = NULL WHERE `tbl_nen`.`nen_id` = $idNen;";
	}                      
		mysqli_query($conexio, $sql);



 ?>