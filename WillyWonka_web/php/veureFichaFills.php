<?php 

//session_start(); aquí se tiene que quitar el sesion estar porque se incluye en una página que ya lo tiene inciado y si lo dejamos peta.
$id = $_SESSION['usu_id'];
$tipus = $_SESSION['usu_tipus'];
include('conexio.php');

// if ($tipus = 'tutor') {
	$sql = "SELECT * FROM tbl_familia where usu_id1 = $id OR usu_id2 = $id";
// }else{echo "No eres tutor (esto deberia de estar protegido";}
$resultat = mysqli_query($conexio, $sql);
if (mysqli_num_rows($resultat) != 0 ) {
	while ($fam = mysqli_fetch_array($resultat)) {
		$fam_id = $fam['fam_id'];
	}
}

$sql = "SELECT * FROM tbl_nen where fam_id = $fam_id";
// }else{echo "No eres tutor (esto deberia de estar protegido";}
$resultat = mysqli_query($conexio, $sql);
if (mysqli_num_rows($resultat) != 0 ) {
	while ($nen = mysqli_fetch_array($resultat)) {
		echo "<br><img src='../img/personas.png'>";
		echo "<br><b>Nom: </b>" . $nen['nen_nom'] . " " . $nen['nen_cognoms'];
		echo "<br><b>Data naixement: </b>" . $nen['nen_data_naixement'];
		echo "<br><b>Alergies: </b>" . $nen['nen_alergies'];
		echo "<br><b>Trastorns: </b>" . $nen['nen_trastorns'];
		echo "<br><b>Malalties: </b>" . $nen['nen_malaltia']."<br><br>";
	}
}
?>