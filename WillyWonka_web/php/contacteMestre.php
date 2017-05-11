<?php session_start();
include '/conexio.php';
$usu_id = $_SESSION['usu_id'];
$usu_nom = $_SESSION['usu_nom'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Contacto</title>
</head>
<body>
	<form name="sentMessage" id="contactForm" action="procs/enviarCorreo.proc.php" novalidate>
        <label for="email">Receptor</label>
        <?php 
        // echo "$usu_id"; 
        ?>
        	<select id="selectProfe"  name="mail_correu">
        	<?php 
				$usu_id = $_SESSION['usu_id'];
				// echo "$usu_id";
				$sqlAdmin="SELECT * FROM tbl_usuari where usu_tipus = 'admin'";
								$resultsAdmin=mysqli_query($conexio,$sqlAdmin);
								if (mysqli_num_rows($resultsAdmin) != 0){
									while ($usuAdmin = mysqli_fetch_array($resultsAdmin)) {
										$nomAdmin = $usuAdmin['usu_nom']." ".$usuAdmin['usu_cognoms'];
										$mailAdmin = $usuAdmin['usu_mail'];
										echo "<option value=$mailAdmin>$nomAdmin</option>";
											
									}
								}
    //     	   	Hay que filtrar los tutores según si el hijo esta o no en la clase del maestro
				// $usu_id = $_SESSION['usu_id'];
				// echo "$usu_id";
				// $sqlAdmin="SELECT * FROM tbl_usuari where usu_tipus = 'tutor'";
				// 				$resultsTutor=mysqli_query($conexio,$sqlTutor);
				// 				if (mysqli_num_rows($resultsTutor) != 0){
				// 					while ($usuTutor = mysqli_fetch_array($resultsTutor)) {
				// 						$nomTutor = $usuTutor['usu_nom']." ".$usuTutor['usu_cognoms'];
				// 						$mailTutor = $usuTutor['usu_mail'];
				// 						echo "<option value=$mailTutor>$nomTutor</option>";
											
				// 					}
				// 				}
        	
				// $usu_id = $_SESSION['usu_id'];
				// echo "$usu_id";
        		$sql="SELECT * FROM tbl_usuari where usu_id = $usu_id";
				$results=mysqli_query($conexio,$sql);
				if (mysqli_num_rows($results) != 0){
					while ($cla = mysqli_fetch_array($results)) {
						$cla_id = $cla['cla_id'];
						$sqlC="SELECT * FROM tbl_nen where  cla_id = $cla_id";
						$resultsC=mysqli_query($conexio,$sqlC);
						if (mysqli_num_rows($resultsC) != 0){
							while ($fam = mysqli_fetch_array($resultsC)) {
								$fam_id = $fam['fam_id'];
								$sqlF="SELECT * FROM tbl_familia where fam_id = $fam_id";
								$resultsF=mysqli_query($conexio,$sqlF);
								if (mysqli_num_rows($resultsF) != 0){
									while ($usuTutor = mysqli_fetch_array($resultsF)) {
										$idTutor2 = $usuTutor['usu_id2'];
										$idTutor1 = $usuTutor['usu_id1'];

										$sqlF1="SELECT * FROM tbl_usuari where usu_id = $idTutor1";
										$resultsUsuari=mysqli_query($conexio,$sqlF1);
										if (mysqli_num_rows($resultsUsuari) != 0){
											while ($usuTutorOption = mysqli_fetch_array($resultsUsuari)) {
												$nomTutor = $usuTutorOption['usu_nom']." ".$usuTutorOption['usu_cognoms'];
												$mailTutor = $usuTutorOption['usu_mail'];
												echo "<option value=$mailTutor>$nomTutor</option>";
												// echo "$nomTutor ------- $mailTutors";
													
											}
										}
										$sqlF2="SELECT * FROM tbl_usuari where usu_id = $idTutor2";
										$resultsUsuari2=mysqli_query($conexio,$sqlF2);
										if (mysqli_num_rows($resultsUsuari2) != 0){
											while ($usuTutorOption2 = mysqli_fetch_array($resultsUsuari2)) {
												$nomTutor = $usuTutorOption2['usu_nom']." ".$usuTutorOption2['usu_cognoms'];
												$mailTutor = $usuTutorOption2['usu_mail'];
												echo "<option value=$mailTutor>$nomTutor</option>";
												// echo "$nomTutor ------- $mailTutors";
													
											}
										}
										// $mailTutor = $usuTutor['usu_mail'];
										// echo "<option value=$mailTutor>$nomTutor</option>";
											
									}
								}
							}
						}	
					}	
				}
				?>
				</select>
        <label for="email">Asunto</label>   
         <input type="text" class="form-control" placeholder="Asunte" name="mail_asunto" required data-validation-required-message="Per favor, introdueixi un asunte pel missatge.">    
        
        <label for="message">Missatge</label>
            <textarea rows="5" class="form-control" placeholder="Missatge" name="mail_missatge" required data-validation-required-message="Per favor, introdueixi el seu missatge."></textarea>  
                <br>
        <button type="submit" class="btn btn-success btn-lg">Envia</button>
                       
    </form>

</body>
</html>