<?php 
extract($_REQUEST);
include('../conexio.php');
	$sqlClasse = "INSERT INTO `tbl_classe` (`cla_id`, `cla_nom`, `cla_curs`, `cla_foto`) VALUES (NULL, '$cla_nom', '$cla_curs', '$cla_foto');";
	mysqli_query($conexio, $sqlClasse);
	$cla_id = mysqli_insert_id($conexio);



	$cla_id = mysqli_insert_id($conexio);
	
	$sql = "UPDATE `tbl_usuari` SET `cla_id` = '$cla_id' WHERE `tbl_usuari`.`usu_id` = ".$mestreId.";";
	// echo "$sql";
	mysqli_query($conexio, $sql);
	header('Location:../gestioClasses.php');
 ?>