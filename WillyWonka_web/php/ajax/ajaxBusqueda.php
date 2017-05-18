<?php 
extract($_REQUEST);
// echo $busqueda . "------" . $decisioBusqueda;
include('../conexio.php');

if (isset($busqueda)) {
	# code...
}else{
	$busqueda = "";
}

switch ($decisioBusqueda) {
	case 'editarNen':
		$sql = "SELECT * FROM tbl_nen WHERE nen_nom LIKE '%$busqueda%' OR nen_cognoms LIKE '%$busqueda%'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table class='table table-hover'><tr class='datos_tabla'><th>Nom</th><th>Cognom</th><th>Acció</th></tr>";
				while ($nen = mysqli_fetch_array($resultat)) {
					$id = $nen['nen_id'];
					echo "<tbody><tr><td>" . $nen['nen_nom'] . "</td><td>" . $nen['nen_cognoms'] . "</td><td><a href='#' onclick='editarNen($id)'>Modificar</a></td></tr></tbody>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		
		break;
	case 'editarTutor':
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'tutor'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table class='table table-hover'><tr class='datos_tabla'><th>Nom</th><th>Cognom</th><th>Acció</th></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tbody><tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='editarTutor($id)'>Modificar</a></td></tr></tbody>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		break;
	case 'editarMestre':
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'mestre'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table class='table table-hover'><tr class='datos_tabla'><th>Nom</th><th>Cognom</th><th>Acció</th></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='editarMestre($id)'>Modificar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";


		break;
	case 'eliminaNen':
			$sql = "SELECT * FROM tbl_nen WHERE nen_nom LIKE '%$busqueda%' OR nen_cognoms LIKE '%$busqueda%'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table class='table table-hover'><tr class='datos_tabla'><th>Nom</th><th>Cognom</th><th>Acció</th></tr>";
				while ($nen = mysqli_fetch_array($resultat)) {
					$id = $nen['nen_id'];
					echo "<tr><td>" . $nen['nen_nom'] . "</td><td>" . $nen['nen_cognoms'] . "</td><td><a href='#' onclick='eliminarNen($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		break;
	case 'eliminaTutor':
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'tutor'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table class='table table-hover'><tr class='datos_tabla'><th>Nom</th><th>Cognom</th><th>Acció</th></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='eliminarUsu($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		
		break;
	case 'eliminaMestre':
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'mestre'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table class='table table-hover'><tr class='datos_tabla'><th>Nom</th><th>Cognom</th><th>Acció</th></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='eliminarUsu($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		break;
	
	default:
		# code...
		break;
}


 ?>