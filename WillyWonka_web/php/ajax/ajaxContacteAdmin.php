<?php 
extract($_REQUEST);
include "../conexio.php";

$sql = "SELECT * FROM tbl_usuari WHERE usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%' OR usu_tipus LIKE '%$busqueda%' ORDER BY usu_tipus";
$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<select name='mail_correu'>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$correu = $usu['usu_mail'];
					$nom = $usu['usu_nom']." ".$usu['usu_cognoms'];
					echo "<option value='$correu'>$nom</option>";
				}
				echo "</select>";
			}else{echo "No hi han mails!";}


 ?>