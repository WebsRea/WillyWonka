<!DOCTYPE html>
<html lang="cat">
<head>
    <?php
        session_start();
        
        include "conexio.php";

        $usu_id = $_SESSION['usu_id'];
		$usu_nom = $_SESSION['usu_nom'];

        $sql = "SELECT * FROM tbl_usuari WHERE usu_id = " . $_SESSION['usu_id'];
        $resultat=mysqli_query($conexio, $sql);
                    // echo "foisndfuignfdiuog";
        if (mysqli_num_rows($resultat) != 0 ) {
            while ($usuari = mysqli_fetch_array($resultat)) {
                $_SESSION['usu_id'] = $usuari['usu_id'];
                $_SESSION['usu_tipus'] = $usuari['usu_tipus'];
                if ($_SESSION['usu_id'] == $usuari['usu_id'] AND $usuari['usu_tipus'] == 'admin') {
                    //echo "Hola, " . $_SESSION['usu_nom'] . " ets un/a " . $_SESSION['usu_tipus'] . ".<br>";
                }
                //echo "<a href='gestioPerfils.php'>Gestionar Perfils</a>";
            }
        } else {
            header('location:../../index.php?err=1');
        }                      
    ?>
    <?php
        include "includes_admin/head.php";

    ?>
</head>
<body>
	 <!-- Empezamos con el nav -->
    <nav class="navbar navbar-fixed-top navegador"  role="navigation">
        <div class="container">
            <!-- Creamos el header del menu -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" >
                    <span class="sr-only">Alternar menu</span>
                    <img src="../img/001-chocolate.png"></img>               
                </button>
                <a href="index_mestre.php"><img class="img-responsive" src="../img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="veureFichesNens.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Perfils </a>
                    <a href="afegirActivitat.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Activitats</a>
                    <a href="modificarStock.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Stock</a>
                    <a href="contacteMestre.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
                    <a href="records.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Records</a>
                </div>
            </div>
            <div class="container">
                <h4 class="h4inicio">
                <div class="row">
                <?php 
                echo "Sigues benvingut, " . $_SESSION['usu_nom'] . " et quedes amb mi o prefereixes  <a href='../index.php'><i class='fa fa-power-off' aria-hidden='true'> Sortir</i></a> ?<br>";
                ?>
                </div>
                </h4>
            </div>

        </div>
    </nav>
    <!-- /.nav -->
    <div class="jumbotron frase">
		<h2 class="h2fam">Envia emails als diferents usuaris <br><small class="peque">Recorda que el tipus d'usuari existent es admin tutor o mestre</small></h2>
	</div>
	<div class="container">
	<div class="col-md-4"></div>
    <div class="col-md-5 ">

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
						</select><br>
		        <label for="email">Assumpte</label>   
		         <input type="text" class="form-control" placeholder="Assumpte" name="mail_asunto" required data-validation-required-message="Per favor, introdueixi un asunte pel missatge.">    
		        
		        <label for="message">Missatge</label>
		            <textarea rows="5" class="form-control" placeholder="El vostre correu" name="mail_missatge" required data-validation-required-message="Per favor, introdueixi el seu missatge."></textarea>  
		                <br>
		        <button type="submit" class="btn btn-willy text-center btn-lg">Enviar</button>
		                       
		    </form>
</div>		    
</div>
</body>
<br><br>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>