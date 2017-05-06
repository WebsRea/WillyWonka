<?php 
include('../conexio.php');
extract($_REQUEST);

$sqlUpdate = "UPDATE `tbl_nen` SET `nen_nom` = '$nom', `nen_cognoms` = '$cognoms', `nen_data_naixement` = '$data', `nen_alergies` = '$alergies', `nen_trastorns` = '$trastorns', `nen_malaltia` = '$malalties' WHERE `tbl_nen`.`nen_id` = $id;";

mysqli_query($conexio, $sqlUpdate);
header('Location:../gestioPerfils.php');

 ?>
