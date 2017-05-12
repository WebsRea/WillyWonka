<?php session_start();

if (isset($_SESSION['usu_id'])) {
	if ($_SESSION['usu_tipus'] != "tutor") {
		header('Location:paginaPrincipal.php');
	}
}else{
	header('Location:login.php');
}




 ?>