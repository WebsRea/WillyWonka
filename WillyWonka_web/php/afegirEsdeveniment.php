<!DOCTYPE html>
<html lang="cat">
<head>
    <?php
        session_start();
  
        include "includes_admin/head.php";

    ?>
</head>
<body id="inicio">

    <!-- Empezamos con el nav -->
    <nav class="navbar navbar-fixed-top navegador"  role="navigation">
        <div class="container">
            <!-- Creamos el header del menu -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" >
                    <span class="sr-only">Alternar menu</span>
                    <img src="../img/001-chocolate.png"></img>               
                </button>
                <a href="index_admin.php"><img class="img-responsive" src="../img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="gestioPerfils.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Perfils </a>
                    <a href="gestioClasses.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Classes</a>
                    <a href="afegirEsdeveniment.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Esdeveniments</a>
                    <a href="subirArchivo.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Documents</a>
                    <a href="contacteAdmin.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
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
   		<div class="container">
   			<div class="row">
		    	<h2 class="text-center">Crea els esdeveniments de la llar d'infants</h2> 
		    </div>
		    	<div class="col-md-4"></div>
		    	<div class="col-md-4 padmin"> 
					<form name="anadirEvento" action="procs/afegirEsdeveniment.proc.php">
						<div class="form-group">
						<lable>Nom de l'esdeveniment:</lable>
						<input type="textArea" name="esd_titol" class="form-control">
						</div>
						<div class="form-group">
						<lable>Descripció:</lable>
						<textarea name="esd_text" maxlength="500" class="form-control"></textarea>
						</div>
						<div class="form-group">
						<lable>Dia de l'inici de l'esdeveniment:</lable>
						<input type="date" name="esd_data_ini" class="form-control">
						</div>
						<div class="form-group">
						<lable>Dia del final de l'esdeveniment:</lable>
						<input type="date" name="esd_data_fin" class="form-control"	>
						</div>
						<input type="submit" name="enviar" class="btn btn-willy btn-lg">
					</form>
				</div>
		</div>
        
    </div>

    <div class="container">
    	<?php
		  include "mostrarEsdeveniment.php";
		?>
        
    </div>
    
</body>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>