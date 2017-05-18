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
                <a href="index_tutor.php"><img class="img-responsive" src="../img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="index_tutor.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Perfils </a>
                    <a href="veureActivitats.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Activitats</a>
                    <a href="#" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Menu del dia</a>
                    <a href="#" class="btn btn-willy btn-lg" >
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
        <div class="container pfam">
            <h2 class="h2fam"> Els meus nens</h2>
    
            <div class="col-md-4">
                <?php include "veureFichaFills.php";?>
            
        </div>
    </div>

    <div class="container">
    

    </div>
    
</body>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>