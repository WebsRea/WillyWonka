<?php 
	
	extract($_REQUEST);

	include('../conexio.php');

	$usu_pass = hash('sha512',$usu_pass);

		$sql = "INSERT INTO `tbl_usuari` (`usu_id`, `usu_nom`, `usu_cognoms`, `usu_mail`, `usu_pass`, `usu_estat`, `usu_tipus`, `mes_id`, `cla_id`) VALUES (NULL, '$usu_nom', '$usu_cognoms', '$usu_mail', '$usu_pass', 'actiu', 'mestre', NULL, NULL);";
		mysqli_query($conexio, $sql);
		header('Location:../gestioPerfils.php');



 ?>