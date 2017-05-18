<?php session_start();
extract($_REQUEST); //Recibimos $usu_mail i $usu_pass

include('../conexio.php');

//Encriptamos la password con hash sha512
$usu_pass = hash('sha512',$usu_pass);

$sql = "SELECT * FROM tbl_usuari WHERE usu_mail = '$usu_mail' AND usu_pass = '$usu_pass'";

$resultat=mysqli_query($conexio, $sql);
				// echo "foisndfuignfdiuog";
	if (mysqli_num_rows($resultat) != 0 ) {
		while ($usuari = mysqli_fetch_array($resultat)) {
			$_SESSION['usu_id'] = $usuari['usu_id'];
			$_SESSION['usu_tipus'] = $usuari['usu_tipus'];
			$_SESSION['usu_nom'] = $usuari['usu_nom'] . " " . $usuari['usu_cognoms'];
			if ($usuari['usu_pass'] = "3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2") {
				$_SESSION['pass123'] = "<a href='../canvarPass.php'>Et recomenem canviar la contrasenya</a>";
			}
			header('Location:../paginaPrincipal.php');
		}
	} else {
		header('location:../../index.php?err=1');
		echo "$sql";
	}                      
?>