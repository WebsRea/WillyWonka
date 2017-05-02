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
			switch ($_SESSION['usu_tipus']) {
				case 'tutor':
					header('Location:../tutor.php');
					break;
				case 'mestre':
					header('Location:../mestre.php');
					break;
				case 'admin':
					header('Location:../admin.php');
					break;
				
				default:
					header('Location:tancaSessio.proc.php');
					break;
			}
		}
	} else {
		//header('location:../../index.php?err=1');
		echo "$sql";
	}                      
?>