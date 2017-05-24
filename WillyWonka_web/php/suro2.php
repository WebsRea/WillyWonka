<?php 

				include "conexio.php";
				$sql = "SELECT * FROM `tbl_suro` ORDER BY sur_data DESC";
				$resultat = mysqli_query($conexio, $sql);
							if (mysqli_num_rows($resultat) != 0 ) {
								while ($suro = mysqli_fetch_array($resultat)) {
									echo "<div class='col-md-4 '";
									echo "<b>" . $suro['sur_titol'] . "</br> Data: ".$suro['sur_data']."<br>";
									$idPare = $suro['usu_id'];
									$sqlPare = "SELECT * FROM `tbl_usuari` where usu_id = $idPare";
									$resultatPare = mysqli_query($conexio, $sqlPare);
									if (mysqli_num_rows($resultatPare) != 0 ) {
										while ($pare = mysqli_fetch_array($resultatPare)) {
											echo "Autor: " . $pare['usu_nom'] . " ". $pare['usu_cognoms'] . "<br>"; 
										}
									}
									echo $suro['sur_text'] . "<br><br>";
									echo "</div>";
								}
							}else{echo "BENVINGUTS!<br>Encara no ha escrit ningú, sigues el primer! <img src='../img/icon/satisfied.png'><br><br><br><br><br>";}

				 ?>
		