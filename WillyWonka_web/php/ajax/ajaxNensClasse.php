<?php 
extract($_REQUEST);
include '../conexio.php';

// echo "$id";
$sql = "SELECT * FROM tbl_nen WHERE cla_id = $id";
	$resultat=mysqli_query($conexio, $sql);
	if (mysqli_num_rows($resultat) != 0 ) {
		echo "<h2>Infants d'aquesta classe:</h2>";
		echo "<table class='table table-hover'><tr><td>Nom</td><td>Cognoms</td><td>Acció</td></tr>";
		while ($nen = mysqli_fetch_array($resultat)) {
			echo "<tr><td>".$nen['nen_nom']."</td><td>".$nen['nen_cognoms']."</td><td><a href='#' onclick='afegirEliminarNen(".$nen['nen_id'].")'>Treure</a></td></tr>";
		}
		echo "</table>";
	}else{
		echo "<img src='../img/icon/001-sad.png'> Aquesta clase no té cap nen assignat.";
	}              


 ?>