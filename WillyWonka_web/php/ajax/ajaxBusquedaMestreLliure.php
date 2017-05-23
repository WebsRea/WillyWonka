<?php 
extract($_REQUEST);
// echo $busqueda . "------" . $decisioBusqueda;
include('../conexio.php');

if (isset($busqueda)) {
	# code...
}else{
	$busqueda = "";
}

if ($busqueda != "") {
	
	$sql = "SELECT * FROM tbl_usuari WHERE usu_tipus = 'mestre' AND cla_id is null AND (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%')";
	$resultat = mysqli_query($conexio, $sql);
	if (mysqli_num_rows($resultat) != 0 ) {
		echo "<select name='mestreId'>";
		while ($usu = mysqli_fetch_array($resultat)) {
			$id = $usu['usu_id'];
			$nom = $usu['usu_nom'] . " " . $usu['usu_cognoms'];
			echo "<option value='$id' name='usu_id'>$nom</option>";
		}
	}else{echo "No hi ha cap mestre disponible en aquesta recerca<img src='../img/icon/001-sad.png'>";}
		echo "</select>";
	// echo "$sql";
	
}else{
	
	$sql = "SELECT * FROM tbl_usuari WHERE usu_tipus = 'mestre' AND cla_id is null AND (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%')";
	$resultat = mysqli_query($conexio, $sql);
	if (mysqli_num_rows($resultat) != 0 ) {
		echo "<select name='mestreId'>";
		while ($usu = mysqli_fetch_array($resultat)) {
			$id = $usu['usu_id'];
			$nom = $usu['usu_nom'] . " " . $usu['usu_cognoms'];
			echo "

			<option value='$id' name='usu_id'>$nom</option>";
		}
	}else{echo "No hi ha cap mestre disponible en aquesta recerca<img src='../img/icon/001-sad.png'>";}
		echo "</select>";
	// echo "$sql";
	
}


 ?>