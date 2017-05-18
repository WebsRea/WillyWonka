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

	include('conexio.php');
	$ini = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
	// $ini = $any . "-" . $mesProx."-".$dia;
	$fi = date("Y-m-d-");
	$usu_id = $_SESSION['usu_id'];
	$sql="SELECT * FROM tbl_familia where (usu_id1 = $usu_id OR usu_id2 = $usu_id)";
								
		$results=mysqli_query($conexio,$sql);
		if (mysqli_num_rows($results) != 0){
			while ($usu = mysqli_fetch_array($results)) {
				$fam_id = $usu['fam_id'];
				$sqlN="SELECT * FROM tbl_nen where  fam_id = $fam_id";
				$resultsN=mysqli_query($conexio,$sqlN);
				if (mysqli_num_rows($resultsN) != 0){
					while ($nen2 = mysqli_fetch_array($resultsN)) {
						$nom = $nen2['nen_nom'];
						echo "Activitats de: $nom";
						$cla_id = $nen2['cla_id'];
							$sql="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= (NOW() + INTERVAL 1 WEEK) AND act_data_fi >= (NOW() + INTERVAL 1 WEEK) AND cla_id = 1 ORDER BY act_data_ini DESC"; 
							
							$results=mysqli_query($conexio,$sql);
							if ($row = mysqli_fetch_array($results)){ 
							   echo "<table border = '1'> \n"; 
							   echo "<tr><td>Titol</td><td>Descripció</td><td>Data Inicial</td><td>Data Final</td></tr> \n"; 
							   do { 
							      echo "<tr><td>".$row["act_titol"]."</td><td>".$row["act_text"]."</td><td>".$row["act_data_ini"]."</td><td>".$row["act_data_fi"]."</td></tr> \n"; 
							   } while ($row = mysqli_fetch_array($results)); 
							   echo "</table> \n"; 
							} else { 
							echo "¡ No se ha encontrado ningún registro !"; 
							} 




							}
						}
					}
				}		
 ?>
    		
		</div> 
	</div>
		<br><br>
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



<!--  -->

