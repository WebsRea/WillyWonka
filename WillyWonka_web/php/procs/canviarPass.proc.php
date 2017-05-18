<?php session_start();
include('../conexio.php');
extract($_REQUEST);
if (!isset($_SESSION['usu_id'])) {
	header('Location:../index.php');
}else{
	$usu_id = $_SESSION['usu_id'];
}

$sql = "SELECT * FROM tbl_usuari WHERE usu_id = $usu_id";
$results=mysqli_query($conexio,$sql);
	if (mysqli_num_rows($results) != 0){
		while ($usu = mysqli_fetch_array($results)) {
			$pass_antiga_sql = $usu['usu_pass'];
			$usu_mail = $usu['usu_mail'];
		}
	}

$pass_antiga = hash('sha512', $pass_antiga);
if ($pass_antiga != $pass_antiga_sql) {
	if (isset($_SESSION['errors'])) {
		$_SESSION['errors'] .= "<br> Contrasenya antiga erronea.";
	}else{
		$_SESSION['errors'] = "Contrasenya antiga erronea.";
	}
}

if ($pass_nova1 != $pass_nova2) {
	if (isset($_SESSION['errors'])) {
		$_SESSION['errors'] .= "<br> Las contraseñas no coinciden";
	}else{
		$_SESSION['errors'] = "Las contraseñas no coinciden";
	}
}

if (isset($_SESSION['errors'])) {
	header('Location:../canviarPass.php');
}else{

	$pass_nova1 = hash('sha512', $pass_nova1);
	$sqlUptdate = "UPDATE `tbl_usuari` SET `usu_pass` = '$pass_nova1' WHERE `tbl_usuari`.`usu_id` = $usu_id;";
	$results=mysqli_query($conexio,$sqlUptdate);
	$message = "S'ha restablert la contrasenya per al correu: $usu_mail <br> Ara es: $pass_nova2":
	mail($usu_mail, 'Nova contrasenya', $message);
	header('Location:../paginaPrincipal.php');

}
 ?>