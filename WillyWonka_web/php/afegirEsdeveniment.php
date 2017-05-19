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
                    <a href="" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Documents</a>
                    <a href="#" class="btn btn-willy btn-lg" >
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

       
	<form name="anadirEvento" action="procs/afegirEsdeveniment.proc.php">
		Nom de l'esdeveniment:
		<input type="textArea" name="esd_titol"><br><br>
		Descripció:<br>
		<textarea name="esd_text" maxlength="500"></textarea><br><br>
		Dia de l'inici de l'esdeveniment:
		<input type="date" name="esd_data_ini"><br><br>
		Dia del final de l'esdeveniment:
		<input type="date" name="esd_data_fin"><br><br>
		<input type="submit" name="enviar">
	</form>
        
    </div>

    <div class="container">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>
    
</body>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>