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
                <a href="index_tutor.php"><img class="img-responsive" src="../img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="index_tutor.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Perfils </a>
                    <a href="veureActivitats.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Activitats</a>
                    <a href="veureMenus.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Menu del dia</a>
                    <a href="formContactoFam.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
                    <a href="#" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Suro</a>
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
        	<select id="selectProfe"  name="mail_correu">
        	<?php 
				include '../conexio.php';
				$usu_id = $_SESSION['usu_id'];
				echo "$usu_id";
        		$sql="SELECT * FROM tbl_familia where (usu_id1 = $usu_id OR usu_id2 = $usu_id)";
				$results=mysqli_query($conexio,$sql);
				if (mysqli_num_rows($results) != 0){
					while ($usu = mysqli_fetch_array($results)) {
						$fam_id = $usu['fam_id'];
						$sqlN="SELECT * FROM tbl_nen where  fam_id = $fam_id";
						$resultsN=mysqli_query($conexio,$sqlN);
						if (mysqli_num_rows($resultsN) != 0){
							while ($nen2 = mysqli_fetch_array($resultsN)) {
								$cla_id = $nen2['cla_id'];
								$sqlU="SELECT * FROM tbl_usuari where cla_id = $cla_id";
								$resultsU=mysqli_query($conexio,$sqlU);
								if (mysqli_num_rows($resultsU) != 0){
									while ($usu2 = mysqli_fetch_array($resultsU)) {
										$nomProfe = $usu2['usu_nom']." ".$usu2['usu_cognoms'];
										$mailProfe = $usu2['usu_mail'];
										echo "<option value=$mailProfe>$nomProfe</option>";
											
									}
								}
							}
						}	
					}
				}
				$sqlAdmin="SELECT * FROM tbl_usuari where usu_tipus = 'admin'";
								$resultsAdmin=mysqli_query($conexio,$sqlAdmin);
								if (mysqli_num_rows($resultsAdmin) != 0){
									while ($usuAdmin = mysqli_fetch_array($resultsAdmin)) {
										$nomAdmin = $usuAdmin['usu_nom']." ".$usuAdmin['usu_cognoms'];
										$mailAdmin = $usuAdmin['usu_mail'];
										echo "<option value=$mailAdmin>$nomAdmin</option>";
											
									}
								}
        	 ?>
</select>
        <label for="email">Asunto</label>   
         <input type="text" class="form-control" placeholder="Asunte" name="mail_asunto" required data-validation-required-message="Per favor, introdueixi un asunte pel missatge.">    
        
        <label for="message">Missatge</label>
            <textarea rows="5" class="form-control" placeholder="Missatge" name="mail_missatge" required data-validation-required-message="Per favor, introdueixi el seu missatge."></textarea>  
                <br>
        <button type="submit" class="btn btn-willy btn-lg">Enviar</button>
                       
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