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
    <title>WilyWonka</title>
    <meta charset="utf-8" charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">

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
                <a href="#inicio"><img class="img-responsive" src="../img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="gestioPerfils.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img> Perfils </a>
                    <a href="#" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img> Qué fem </a>
                    <a href="#" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img> Escola amiga </a>
                    <a href="#" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
                    <a href="../index.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img> Sortir</a>
                </div>
            </div>
            <div class="container">
                <h4 class="h4inicio">
                <?php 
                echo "Sigues benvingut, " . $_SESSION['usu_nom'] . ".<br>";
                ?>
                </h4>
            </div>

        </div>
    </nav>
    <!-- /.nav -->
   
     <div class="jumbotron frase">

        <p> <?php include "veureFrase.php";?></p>
        
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
    <div class="container">
        <div class="col-md-6 text-justify peu">
            <p>&copy;2017 websREA, SA. Tots els drets reservats</p>
            <p><a class="peu" href="#">Avís legal</a></p>
            <p><a class="peu" href="#">Política de privacitat</a></p>
        </div>
        <div class="col-md-6 text-right peu">
        <p>La nostra adreça:</p>
        <p>C/Carretera Ag.Garos, 17</p>
        <p>08923 Viella</p>
            
        </div>
    </div>

</footer>
</html>