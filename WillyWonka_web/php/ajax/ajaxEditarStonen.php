<?php 
// $stonen_id
// $quantitat
extract($_REQUEST);
$sql = "UPDATE `tbl_stock_nen` SET `stonen_quantitat` = '$quantitat' WHERE `tbl_stock_nen`.`stonen_id` = $stonen_id;";
	include('../conexio.php');
	$resultat = mysqli_query($conexio, $sql);

	if ($quantitat = 'alerta' OR $quantitat = 'reserva') {
		$sqlMail = "SELECT * FROM tbl_stock_nen WHERE stonen_id = $stonen_id";
		$resultatMail = mysqli_query($conexio, $sqlMail);
		if (mysqli_num_rows($resultatMail) != 0 ) {
			while ($stoMail = mysqli_fetch_array($resultatMail)) {
				$sto_id = $stoMail['sto_id'];
				$sqlStock = "SELECT * FROM tbl_stock WHERE sto_id = $sto_id";
				$resultatStock = mysqli_query($conexio, $sqlStock);
				if (mysqli_num_rows($resultatStock) != 0) {
					while ($stock = mysqli_fetch_array($resultatStock)) {
						$nomStock = $stock['sto_nom'];
					}
				}
				$nen_id = $stoMail['nen_id'];
				$sqlFam = "SELECT * FROM tbl_nen WHERE nen_id = $nen_id";
				$resultatFam = mysqli_query($conexio, $sqlFam);
				if (mysqli_num_rows($resultatFam) != 0 ) {
					while ($fam = mysqli_fetch_array($resultatFam)) {
						$nen_nom = $fam['nen_nom'];
						//Mail al familiar 1
						if (isset($fam['usu_id1'])) {
							$usu_id1 = $fam['usu_id1'];
							$sqlPare1 = "SELECT * FROM tbl_usuari WHERE usu_id = $usu_id1";
							$resultatPare1 = mysqli_query($conexio, $sqlPare1);
							if (mysqli_num_rows($resultatPare1) != 0 ) {
								while ($pare1 = mysqli_fetch_array($resultatPare1)) {
									$nom1 = $pare1['usu_nom'] . " " . $pare1['usu_cognom'];
									$correu1 = $pare1['usu_mail'];
									// the message
									$msg = "Benvolgut/da $nom1\nEns hem quedat sense $nomStock del seu fill/a ". $nen_nom .". \nPreguem que en porti lo abans possible.\n Salutacions, LLar d'infants Willy Wonka.";
									// use wordwrap() if lines are longer than 70 characters
									$msg = wordwrap($msg,70);
									mail($correu1,"Recorda: ens falta/en $nomStock.",$msg);
								}
							}
						}
						//Mail al familiar 2
						if (isset($fam['usu_id2'])) {
							$usu_id2 = $fam['usu_id2'];
							$sqlPare2 = "SELECT * FROM tbl_usuari WHERE usu_id = $usu_id2";
							$resultatPare2 = mysqli_query($conexio, $sqlPare2);
							if (mysqli_num_rows($resultatPare2) != 0 ) {
								while ($pare2 = mysqli_fetch_array($resultatPare2)) {
									$nom2 = $pare2['usu_nom'] . " " . $pare2['usu_cognom'];
									$correu2 = $pare2['usu_mail'];
									// the message
									$msg = "Benvolgut/da $nom1\nEns hem quedat sense $nomStock del seu fill/a ". $nen_nom .". \nPreguem que en porti lo abans possible.\n Salutacions, LLar d'infants Willy Wonka.";
									// use wordwrap() if lin2s are longer than 70 characters
									$msg = wordwrap($msg,70);
									mail($correu2,"Recorda: ens falta/en $nomStock.",$msg);
								}
							}
						}
								
					}
				}			
			}
		}
	}
		



	//echo "O SALES O MATO A ALGUIEN";
	


 ?>