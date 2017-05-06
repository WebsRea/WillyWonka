<?php 
include('../conexio.php');
extract($_REQUEST);


$sqlUpdate = "UPDATE `tbl_usuari` SET `usu_nom` = '$nom', `usu_cognoms` = '$cognoms', `usu_mail` = '$mail' WHERE `tbl_usuari`.`usu_id` = $id;";
echo "$sqlUpdate";

mysqli_query($conexio, $sqlUpdate);
header('Location:../gestioPerfils.php');

 ?>
