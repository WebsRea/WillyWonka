<!DOCTYPE html>
<html lang="cat">
<head>
    <?php
        session_start();
        
        include "conexio.php";

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
                    <a href="#" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Classe</a>
                    <a href="afegirActivitat.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Activitats</a>
                    <a href="modificarStock.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Stock</a>
                    <a href="contacteMestre.php" class="btn btn-willy btn-lg" >
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
 	<h2 class="h2fam">LA FITXA D'EN:</h2>
 </div>
 <div class="container">

<?php 

extract($_REQUEST);
// include('conexio.php');

$sql = "SELECT * FROM tbl_nen WHERE nen_id = $id";
//echo "string";
$resultat = mysqli_query($conexio, $sql);
if (mysqli_num_rows($resultat) != 0 ) {
	while ($nen = mysqli_fetch_array($resultat)) {
		echo "<div class='pizarra'><h2 class='h2fam'>Nom: " . $nen['nen_nom'] . " " . $nen['nen_cognoms'] ."</h2>";
		echo "<h2 class='h2fam'>Data naixement: " . $nen['nen_data_naixement']."</h2>";
		echo "<h2 class='h2fam'>Alergies: " . $nen['nen_alergies']."</h2>";
		echo "<h2 class='h2fam'>Trastorns: " . $nen['nen_trastorns']."</h2>";
		echo "<h2 class='h2fam'>Malalties: " . $nen['nen_malaltia']."</h2>";
		echo "<h2 class='h2fam'><a href='veureFichesNens.php'>Tornar</a>
	</div>


		";
	}
}

 ?>
</div>
<br>
<br>
</body>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>