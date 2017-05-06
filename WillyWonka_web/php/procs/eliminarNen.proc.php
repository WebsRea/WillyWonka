<?php 
extract($_REQUEST);
include('../conexio.php');

$sql = "DELETE FROM `tbl_nen` WHERE `tbl_nen`.`nen_id` = $id";
$resultat = mysqli_query($conexio, $sql);
header('Location:../gestioPerfils.php');

 ?>