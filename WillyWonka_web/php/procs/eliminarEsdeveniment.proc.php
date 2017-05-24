<?php session_start();
if ($_SESSION['usu_tipus'] == 'admin') {
include '../conexio.php';
extract($_REQUEST);
$sql = "DELETE FROM `tbl_esdeveniments` WHERE `tbl_esdeveniments`.`esd_id` = $esd_id";
mysqli_query($conexio,$sql);
header('Location: ../afegirEsdeveniment.php');
	
}






 ?>