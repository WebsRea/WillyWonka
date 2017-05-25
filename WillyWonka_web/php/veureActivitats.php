<!DOCTYPE html>
<html>
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
                    echo "Hola, " . $_SESSION['usu_nom'] . " ets un/a " . $_SESSION['usu_tipus'] . ".<br>";
                }
                //echo "<a href='gestioPerfils.php'>Gestionar Perfils</a>";
            }
        } else {
            header('location:../../index.php?err=1');
        }                      
    
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
                    <a href="suro.php" class="btn btn-willy btn-lg" >
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
    	<h2 class="h2fam">ACTIVITATS NENS</h2>
    </div>
    <div class="container">
<?php 
	if (isset($_SESSION['usu_tipus']) AND $_SESSION['usu_tipus'] == 'mestre') {



	$ini = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
	// $ini = $any . "-" . $mesProx."-".$dia;
	$fi = date("Y-m-d-");
							//echo "hasta aquí llega";
	$usu_id = $_SESSION['usu_id'];
	$sql="SELECT * FROM tbl_usuari where usu_id = $usu_id";
								
		$results=mysqli_query($conexio,$sql);
		if (mysqli_num_rows($results) != 0){
			while ($usu = mysqli_fetch_array($results)) {
				$cla_id = $usu['cla_id'];
				if (isset($cla_id)) {
				$sqlB="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= NOW() + INTERVAL 1 WEEK AND act_data_fi >= NOW() + INTERVAL 1 WEEK AND cla_id = $cla_id ORDER BY act_data_ini DESC"; 
					// $sql="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= (NOW() + INTERVAL 1 WEEK) AND act_data_fi >= (NOW() + INTERVAL 1 WEEK) AND cla_id = 1 ORDER BY act_data_ini DESC"; 
					
					$resultsB=mysqli_query($conexio,$sqlB);
					if ($row = mysqli_fetch_array($resultsB)){ 

					   echo "<table class=' table table-hover' \n"; 
					   echo "<tr class='datos_tabla'><td>Titol</td><td>Descripció</td><td>Data Inicial</td><td>Data Final</td></tr> \n"; 
					   do { 
					      echo "<tr class='datos_tabla'><td>".$row["act_titol"]."</td><td>".$row["act_text"]."</td><td>".$row["act_data_ini"]."</td><td>".$row["act_data_fi"]."</td></tr> \n"; 
					   } while ($row = mysqli_fetch_array($results)); 
					   echo "</table> \n"; 
					} else { 
					echo "<img src='../img/icon/001-sad.png'> No hi ha cap registre!"; 
					} 
				}else { 
					echo "<img src='../img/icon/001-sad.png'> Aquest usuari no te cap classe asignada!"; 
					} 
				}
			}
		
	}else{

	// session_start();
	// echo "estoy en veure activitats";
	// include('conexio.php');
	$ini = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "+1 month" ) );
	// $ini = $any . "-" . $mesProx."-".$dia;
	$fi = date("Y-m-d-");
							//echo "hasta aquí llega";
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
						$sql="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= NOW() + INTERVAL 1 WEEK AND act_data_fi >= NOW() + INTERVAL 1 WEEK ORDER BY act_data_ini DESC"; 
							// $sql="SELECT * FROM tbl_activitats WHERE now() BETWEEN act_data_ini AND act_data_fi OR act_data_ini <= (NOW() + INTERVAL 1 WEEK) AND act_data_fi >= (NOW() + INTERVAL 1 WEEK) AND cla_id = 1 ORDER BY act_data_ini DESC"; 
							
							$results=mysqli_query($conexio,$sql);
							if ($row = mysqli_fetch_array($results)){ 

							   echo "<table class=' table table-hover'> \n"; 
							   echo "<tr class='datos_tabla'><td>Titol</td><td>Descripció</td><td>Data Inicial</td><td>Data Final</td></tr> \n"; 
							   do { 
							      echo "<tr class='datos_tabla'><td>".$row["act_titol"]."</td><td>".$row["act_text"]."</td><td>".$row["act_data_ini"]."</td><td>".$row["act_data_fi"]."</td></tr> \n"; 
							   } while ($row = mysqli_fetch_array($results)); 
							   echo "</table> \n"; 
							} else { 
							echo "<img src='../img/icon/001-sad.png'> No hi ha cap registre!"; 
							} 
						}
					}
				}
			}		

	}



 ?>
</div>
</body>
</html>
