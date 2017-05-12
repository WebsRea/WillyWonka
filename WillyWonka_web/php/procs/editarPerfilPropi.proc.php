<?php session_start();
extract($_REQUEST);
$usu_id = $_SESSION['usu_id'];
include "../conexio.php";
//usu_mail        pass_antigua    usu_pass1     usu_pass2

if (isset($_SESSION['usu_id'])) {
	if (isset($usu_mail) OR isset($usu_pass1)) {
		$sql = "SELECT * FROM tbl_usuari WHERE usu_id = $usu_id";
		$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				while ($usu = mysqli_fetch_array($resultat)) {
					if ($pass_antigua = $usu['usu_pass']) {
					}else{
						$_SESSION['error'] .= "<br>Contrasenya antiga erronea, si la ha oblidat possis en contacte amb l'administrador";
						header('Location:../editarPerfilPropi.php');
					}
				}
			}
		if (isset($usu_pass1) AND !isset($usu_mail)) {
			if ($usu_pass1 != $usu_pass2) {
				$_SESSION['error'] = "<br>Las contrasenyes no coincideixen";
				header('Location:../editarPerfilPropi.php');
			}else{
				$usu_pass = hash('sha512', $usu_pass1);
				$sqlPass = "UPDATE `tbl_usuari` SET `usu_pass` = '$usu_pass' WHERE `tbl_usuari`.`usu_id` = $usu_id;";
				// echo "$sqlPass";
				$resultat = mysqli_query($conexio, $sqlPass);
				header('Location:../paginaPrincipal.php');
			}

		}
		if (isset($usu_pass1) AND isset($usu_mail)) {
			if ($usu_pass1 != $usu_pass2) {
				$_SESSION['error'] = "<br>Las contrasenyes no coincideixen";
				header('Location:../editarPerfilPropi.php');
			}else{
				$usu_pass = hash('sha512', $usu_pass1);
				//modificar pass i mail
				$sqlMailPass = "UPDATE `tbl_usuari` SET `usu_mail` = '$usu_mail', `usu_pass` = '$usu_pass' WHERE `tbl_usuari`.`usu_id` = $usu_id;";
				// echo "$sqlMailPass";
					$resultat = mysqli_query($conexio, $sqlMailPass);
					header('Location:../paginaPrincipal.php');
			}
		}
		if (isset($usu_mail) AND !isset($usu_pass1)) {
			//modificar mail
			$sqlMail = "UPDATE `tbl_usuari` SET `usu_mail` = '$usu_mail' WHERE `tbl_usuari`.`usu_id` = $usu_id;";
			// echo "$sqlMail";
				$resultat = mysqli_query($conexio, $sqlMail);
				header('Location:../paginaPrincipal.php');
		}
	}
}else{
	header('Location:../login.php');
}




 ?>