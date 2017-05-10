<?php session_start();
$usu_id = $_SESSION['usu_id'];
extract($_REQUEST);
include "../conexio.php";
$data = date("Y-m-d H:i:s");  
if (isset($usu_id)) {
	$sql = "INSERT INTO `tbl_suro` (`sur_id`, `sur_data`, `sur_titol`, `sur_text`, `usu_id`) VALUES (NULL, '$data', '$sur_titol', '$sur_text', '$usu_id');";
	echo "$sql";
	$resultat = mysqli_query($conexio, $sql);
	header('Location:../suro.php');
}





 ?>