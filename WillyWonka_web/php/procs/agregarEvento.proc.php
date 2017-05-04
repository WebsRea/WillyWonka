<?php //session_start();
include '../php/admin.php';
extract($_REQUEST);



include '../conexio/conexio.php';
$sql = "INSERT INTO `tbl_esdeveniments` (`esd_id`, `esd_titol`, `esd_data`, `esd_text`,`usu_id`) VALUES (NULL, '$esd_titol', $esd_data', '$esd_text', '$usu_id');";
 echo "$sql";
mysqli_query($conexion, $sql);


//header('Location:../../index.php');



 ?>