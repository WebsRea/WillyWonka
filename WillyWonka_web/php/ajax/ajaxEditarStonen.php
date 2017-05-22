<?php 
// $stonen_id
// $quantitat
extract($_REQUEST);
$sql = "UPDATE `tbl_stock_nen` SET `stonen_quantitat` = '$quantitat' WHERE `tbl_stock_nen`.`stonen_id` = $stonen_id;";
	include('../conexio.php');
	$resultat = mysqli_query($conexio, $sql);

	$sqlMail = "SELECT * FROM tbl_stock_nen WHERE stonen_id = $stonen_id";
	$resultatMail = mysqli_query($conexio, $sqlMail);
	if (mysqli_num_rows($resultatMail) != 0 ) {
		while ($stoMail = mysqli_fetch_array($resultatMail)) {
			
		}
	}



	echo "O SALES O MATO A ALGUIEN";
	


 ?>