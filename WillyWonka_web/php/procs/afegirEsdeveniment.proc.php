<?php session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];
include '../conexio.php';
$sql = "INSERT INTO `tbl_esdeveniments` (`esd_titol`, `esd_data_ini`, `esd_data_fin`, `esd_text`,`usu_id`) VALUES ('$esd_titol', '$esd_data_ini', '$esd_data_fin', '$esd_text', '$usu_id');";
 // echo "$sql";
mysqli_query($conexio, $sql);


header('Location:../afegirEsdeveniment.php');



 ?>