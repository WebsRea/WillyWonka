<?php session_start();

include('conexio.php');

$sql = "SELECT * FROM tbl_usuari WHERE usu_id = " . $_SESSION['usu_id'] . "";
$resultat=mysqli_query($conexio, $sql);
				// echo "foisndfuignfdiuog";
	if (mysqli_num_rows($resultat) != 0 ) {
		while ($usuari = mysqli_fetch_array($resultat)) {
			$_SESSION['usu_id'] = $usuari['usu_id'];
			$_SESSION['usu_tipus'] = $usuari['usu_tipus'];
			if ($_SESSION['usu_id'] == $usuari['usu_id'] AND $usuari['usu_tipus'] == 'admin') {
				echo "Hola, " . $_SESSION['usu_nom'] . " ets un/a " . $_SESSION['usu_tipus'] . ".<br>";
			}
			echo "<a href='gestioPerfils.php'>Gestionar Perfils</a>";
		}
	} else {
		header('location:../../index.php?err=1');
	}                      

 ?>