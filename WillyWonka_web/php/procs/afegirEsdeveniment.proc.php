<?php session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];
include '../conexio.php';
$sql = "INSERT INTO `tbl_esdeveniments` (`esd_id`, `esd_titol`, `esd_data`, `esd_text`,`usu_id`) VALUES (NULL, '$esd_titol', $esd_data', '$esd_text', '$usu_id');";
 echo "$sql";
mysqli_query($conexio, $sql);


header('Location:../admin.php');



 ?>