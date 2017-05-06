<?php 
include('../conexio.php');
extract($_REQUEST);

	$usu_pass = '123';
	$usu_pass = hash('sha512', $usu_pass);
	$sqlUpdate = "UPDATE `tbl_usuari` SET `usu_pass` = '$usu_pass' WHERE `usu_pass` = $id";
	echo "$sqlUpdate";

	mysqli_query($conexio, $sqlUpdate);
	header('Location:../gestioPerfils.php');

 ?>