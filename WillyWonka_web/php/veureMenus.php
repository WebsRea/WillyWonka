<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		include "includes_admin/head.php";
	?>
</head>
<body id="inicio" class="admin">

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
                echo "Aquí pots veure les activitats dels teus infants " . $_SESSION['usu_nom'] . " o prefereixes  <a href='../index.php'><i class='fa fa-power-off' aria-hidden='true'> Sortir</i></a> ?<br>";
                ?>
                </div>
                </h4>
            </div>

        </div>
    </nav>
    <!-- /.nav -->
    <div class="jumbotron frase">

    	<div class="container padmin">
	
<?php 
	$sql = "SELECT * FROM tbl_document WHERE doc_tipus = 'menu' ORDER BY doc_id DESC";
	include('conexio.php');
	$resultat = mysqli_query($conexio, $sql);
	echo "<h2 class='h2fam'>Aquest és el <img src='../img/icon/menu.png'></img> de la setmana</h2>";
	if (mysqli_num_rows($resultat) != 0 ) {
		while ($doc = mysqli_fetch_array($resultat)) {
			echo $doc['doc_nom'] . " ---- " . $doc['doc_ruta'] . "<br>";
			$ruta = $doc['doc_ruta'];
			$ruta = substr($ruta, 3); 
			echo "<img src='$ruta'>";
		}
	}

	 ?>

		</div> 
	</div>
	<div class="container padmin">
		
	</div>

	<div class="jumbotron frase">
	</div>
	<div class="container padmin">
		
	</div>

	<div class="jumbotron frase">
	</div>
        
    

   
    
</body>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>
