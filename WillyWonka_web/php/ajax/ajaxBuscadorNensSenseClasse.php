<?php 
include '../conexio.php';
	$sql = "SELECT * FROM tbl_nen WHERE cla_id IS NULL";
	$resultat=mysqli_query($conexio, $sql);
	echo "<br><br><br><h4>Nens encara no assignats a cap classe:</h4>";
	if (mysqli_num_rows($resultat) != 0 ) {
		echo "<table><tr><td><h4>Nom</h4></td><td><h4>Cognoms</h4></td><td><h4>Acció</h4></td></tr>";
		while ($nen = mysqli_fetch_array($resultat)) {
			echo "<tr><td>".$nen['nen_nom']."</td><td>".$nen['nen_cognoms']."</td><td><a href='#' onclick='afegirEliminarNen(".$nen['nen_id'].")'>Afegir</td></tr>";
		}
		echo "</table>";
	}else{
		echo "No queden nens sense asignar, afegeix-los o treu d'altres classes per asignar nous infants a aquesta classe.";
	}


 ?>