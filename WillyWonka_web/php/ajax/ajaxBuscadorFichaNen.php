<?php 
extract($_REQUEST);
include('../conexio.php');
$sql = "SELECT * FROM tbl_nen WHERE nen_nom LIKE '%$busqueda%' OR nen_cognoms LIKE '%$busqueda%'";
$resultat = mysqli_query($conexio, $sql);
if (mysqli_num_rows($resultat) != 0 ) {
	echo "<table class='table table-hover'><tr class='datos_tabla'><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
	while ($nen = mysqli_fetch_array($resultat)) {
		$id = $nen['nen_id'];
		echo "<tr><td>" . $nen['nen_nom'] . "</td><td>" . $nen['nen_cognoms'] . "</td><td><a href='veureFicha.php?id=$id'>Veure Ficha</a></td></tr>";
	}
	echo "</table>";
}else{
	echo "<img src='../img/icon/001-sad.png'> No hi han dades disponibles";
}
 ?>