<?php session_start();
extract($_REQUEST);
$idProfe = $_SESSION['usu_id'];
include('../conexio.php');
$sql = "SELECT * FROM tbl_usuari WHERE usu_id = $idProfe";
$resultat = mysqli_query($conexio, $sql);
if (mysqli_num_rows($resultat) != 0 ) {
	while ($usu = mysqli_fetch_array($resultat)) {
		$idClasse = $usu['cla_id'];
	}
}

$sql = "SELECT * FROM tbl_nen WHERE (nen_nom LIKE '%$busqueda%' OR nen_cognoms LIKE '%$busqueda%') AND cla_id = $idClasse";
$resultat = mysqli_query($conexio, $sql);
if (mysqli_num_rows($resultat) != 0 ) {
	echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
	while ($nen = mysqli_fetch_array($resultat)) {
		$id = $nen['nen_id'];
		echo "<tr><td>" . $nen['nen_nom'] . "</td><td>" . $nen['nen_cognoms'] . "</td><td><a href='veureFicha.php?id=$id'>Veure Ficha</a></td></tr>";
	}
	echo "</table>";
}else{
	echo "No hi han dades :'(";
}
 ?>