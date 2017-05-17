

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	
<?php 
	$sql = "SELECT * FROM tbl_document WHERE doc_tipus = 'menu' ORDER BY doc_id DESC";
	include('conexio.php');
	$resultat = mysqli_query($conexio, $sql);
	if (mysqli_num_rows($resultat) != 0 ) {
		while ($doc = mysqli_fetch_array($resultat)) {
			echo $doc['doc_nom'] . " ---- " . $doc['doc_ruta'] . "<br>";
			$ruta = $doc['doc_ruta'];
			$ruta = substr($ruta, 3); 
			echo "<img src='$ruta'>";
		}
	}

	 ?>

</div>
</body>
</html>
