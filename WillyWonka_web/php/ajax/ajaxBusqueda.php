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
		if ($busqueda != "") {
		
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'tutor'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='editarTutor($id)'>Modificar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}else{
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'tutor'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='editarTutor($id)'>Modificar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}
		break;
	case 'editarMestre':
		if ($busqueda != "") {
		
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'mestre'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='editarMestre($id)'>Modificar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}else{
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'mestre'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='editarMestre($id)'>Modificar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}

		break;
	case 'eliminaNen':

		if ($busqueda != "") {
		
			$sql = "SELECT * FROM tbl_nen WHERE nen_nom LIKE '%$busqueda%' OR nen_cognoms LIKE '%$busqueda%'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($nen = mysqli_fetch_array($resultat)) {
					$id = $nen['nen_id'];
					echo "<tr><td>" . $nen['nen_nom'] . "</td><td>" . $nen['nen_cognoms'] . "</td><td><a href='#' onclick='eliminarNen($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}else{
			$sql = "SELECT * FROM tbl_nen WHERE nen_nom LIKE '%$busqueda%' OR nen_cognoms LIKE '%$busqueda%'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($nen = mysqli_fetch_array($resultat)) {
					$id = $nen['nen_id'];
					echo "<tr><td>" . $nen['nen_nom'] . "</td><td>" . $nen['nen_cognoms'] . "</td><td><a href='#' onclick='eliminarNen($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}

		break;
	case 'eliminaTutor':
		if ($busqueda != "") {
		
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'tutor'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='eliminarUsu($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}else{
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'tutor'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='eliminarUsu($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}
		break;
	case 'eliminaMestre':
		if ($busqueda != "") {
		
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'mestre'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='eliminarUsu($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}else{
			$sql = "SELECT * FROM tbl_usuari WHERE (usu_nom LIKE '%$busqueda%' OR usu_cognoms LIKE '%$busqueda%') AND usu_tipus = 'mestre'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<table><tr><h1><td>Nom</td><td>Cognom</td><td>Acció</td><h1></tr>";
				while ($usu = mysqli_fetch_array($resultat)) {
					$id = $usu['usu_id'];
					echo "<tr><td>" . $usu['usu_nom'] . "</td><td>" . $usu['usu_cognoms'] . "</td><td><a href='#' onclick='eliminarUsu($id)'>Eliminar</a></td></tr>";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}
			// echo "$sql";
			
		}
		break;
	
	default:
		# code...
		break;
}


 ?>