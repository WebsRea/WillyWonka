<?php 
// $stonen_id
// $quantitat
extract($_REQUEST);
$sql = "UPDATE `tbl_stock_nen` SET `stonen_quantitat` = '$quantitat' WHERE `tbl_stock_nen`.`stonen_id` = $stonen_id;";
	include('../conexio.php');
	$resultat = mysqli_query($conexio, $sql);
	echo "O SALES O MATO A ALGUIEN";
	


 ?>