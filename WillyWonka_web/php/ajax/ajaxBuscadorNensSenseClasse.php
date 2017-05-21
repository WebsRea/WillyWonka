<?php 
include '../conexio.php';
	$sql = "SELECT * FROM tbl_nen WHERE cla_id IS NULL";
	$resultat=mysqli_query($conexio, $sql);
	echo "
	<br><h4>LListat de nens que encara no tenen asignada una classe:</h4>";
	if (mysqli_num_rows($resultat) != 0 ) {
		echo "<table class='table table-hover'><tr><td>Nom</td><td>Cognoms</td><td>Acció</td></tr>";
		while ($nen = mysqli_fetch_array($resultat)) {
			echo "<tr><td>".$nen['nen_nom']."</td><td>".$nen['nen_cognoms']."</td><td><a href='#' onclick='afegirEliminarNen(".$nen['nen_id'].")'>Afegir</td></tr>";
		}
		echo "</table>";
	}else{
		echo "<img src='../img/icon/001-sad.png'>No queden nens sense assignar, afegeix-los o treu d'altres classes per assignar nous infants a aquesta classe.";
	}

 ?>