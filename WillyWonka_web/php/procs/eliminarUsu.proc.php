<?php 
extract($_REQUEST);
include('../conexio.php');

$sql = "DELETE FROM `tbl_usuari` WHERE `tbl_usuari`.`usu_id` = $id";
$resultat = mysqli_query($conexio, $sql);
header('Location:../gestioPerfils.php');

 ?>