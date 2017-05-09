<?php 

extract($_REQUEST);
include('conexio.php');

$sql = "SELECT * FROM tbl_nen WHERE nen_id = $id";
$resultat = mysqli_query($conexio, $sql);
if (mysqli_num_rows($resultat) != 0 ) {
	while ($nen = mysqli_fetch_array($resultat)) {
		echo "<br><h4>Nom: </h4>" . $nen['nen_nom'] . " " . $nen['nen_cognoms'];
		echo "<br><h4>Data naixement: </h4>" . $nen['nen_data_naixement'];
		echo "<br><h4>Alergies: </h4>" . $nen['nen_alergies'];
		echo "<br><h4>Trastorns: </h4>" . $nen['nen_trastorns'];
		echo "<br><h4>Malalties: </h4>" . $nen['nen_malaltia'];
		echo "<br><br><a href='veureFichesNens.php'>Tornar</a>";
	}
}

 ?>