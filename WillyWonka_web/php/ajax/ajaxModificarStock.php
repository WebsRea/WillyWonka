<?php session_start();
	$usu_id = $_SESSION['usu_id'];
	$sql = "SELECT * FROM tbl_usuari WHERE usu_id = $usu_id";
	include('../conexio.php');
	$resultat = mysqli_query($conexio, $sql);
	if (mysqli_num_rows($resultat) != 0 ) {
		while ($usu = mysqli_fetch_array($resultat)) {
			$cla_id = $usu['cla_id'];
			// echo "$cla_id";
		}
	}
	if (isset($cla_id)) {
		
	$sqlNens = "SELECT * FROM tbl_nen WHERE cla_id = $cla_id";
	$resultat = mysqli_query($conexio, $sqlNens);
	if (mysqli_num_rows($resultat) != 0 ) {
		//echo "<table class='table table-hover'>";
		while ($nen = mysqli_fetch_array($resultat)) {
			$nom = $nen['nen_nom']." ".$nen['nen_cognoms'];
			$nen_id = $nen['nen_id'];
			echo "<div class='container'><h2 class='h2admin'>$nom</h2><br>";
			$sqlStock = "SELECT * FROM tbl_stock INNER JOIN tbl_stock_nen ON `tbl_stock_nen`.`sto_id` = `tbl_stock`.`sto_id` WHERE nen_id = $nen_id";
			$resultatStock = mysqli_query($conexio, $sqlStock);
			if (mysqli_num_rows($resultatStock) != 0 ) {
				while ($nenSto = mysqli_fetch_array($resultatStock)) {
					$quantitat = $nenSto['stonen_quantitat'];
					$stonen_id = $nenSto['stonen_id'];

					switch ($quantitat) {
						case 'ple':
							$radioStocks = "
								<input type='radio' name='$stonen_id' value='ple' onclick='modStock(".$stonen_id.",\"ple\")' checked> ple<br>
								<input type='radio' name='$stonen_id' value='alerta' onclick='modStock(".$stonen_id.",\"alerta\")'> alerta<br>
								<input type='radio' name='$stonen_id' value='escola' onclick='modStock(".$stonen_id.",\"escola\")'> escola<br>
								
							";
							break;

						case 'alerta':
							$radioStocks = "
								<input type='radio' name='$stonen_id' value='ple' onclick='modStock(".$stonen_id.",\"ple\")'> ple<br>
								<input type='radio' name='$stonen_id' value='alerta' onclick='modStock(".$stonen_id.",\"alerta\")' checked> alerta<br>
								<input type='radio' name='$stonen_id' value='escola' onclick='modStock(".$stonen_id.",\"escola\")'> escola<br> 
							";
							break;

						case 'escola':
							$radioStocks = " 
								<input type='radio' name='$stonen_id' value='ple' onclick='modStock(".$stonen_id.",\"ple\")'> ple<br>
								<input type='radio' name='$stonen_id' value='alerta' onclick='modStock(".$stonen_id.",\"alerta\")'> alerta<br>
								<input type='radio' name='$stonen_id' value='escola' onclick='modStock(".$stonen_id.",\"escola\")' checked> escola<br> 
							";
							break;
						
						default:
							$radioStocks = "ERROR";
							break;
					}


					echo "<div class='col-md-3'><img src='../img/estoc/".$nenSto['sto_foto']."'> <br><p class='datos_tabla'>".$nenSto['sto_nom']."</p><i>".$radioStocks."</i><br></div>";
				}
				echo "</div>";
			}

		}
			echo "<div id='oculto'>";
	}else{
		echo "<p class='psom'><img src='../img/icon/001-sad.png'> No hi ha nens.</p>";
	}
	}else{
		echo "<p class='psom'><img src='../img/icon/001-sad.png'> No hi ha classe assignada a aquest usuari.</p>";
	}
 ?>