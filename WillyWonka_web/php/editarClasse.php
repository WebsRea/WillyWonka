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
    <script src="http://code.jquery.com/jquery.js"></script>
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
<body onload="buscadorNensSenseClasse()">
<?php 
	include 'conexio.php';
	extract($_REQUEST);
	echo "<input type='hidden' id='id' value='$id'>";
	$sql = "SELECT * FROM tbl_classe WHERE cla_id = $id";
	$resultat=mysqli_query($conexio, $sql);
				// echo "foisndfuignfdiuog";
	if (mysqli_num_rows($resultat) != 0 ) {
		while ($classe = mysqli_fetch_array($resultat)) {
			$id = $classe['cla_id'];
			$nomClasse = $classe['cla_nom'];
			$foto_classe = $classe['cla_foto'];
			echo "

			<div class='jumbotron frase'>

        		<h2 class='h2fam'><img src='../img/icon/$foto_classe'>$nomClasse</h2>
        
    		</div>
    		<div class='container padmin'>

    		";

			//consulta Profe
			$sql = "SELECT * FROM tbl_usuari WHERE cla_id = $id";
			$resultat=mysqli_query($conexio, $sql);
						// echo "foisndfuignfdiuog";
			if (mysqli_num_rows($resultat) != 0 ) {
				while ($profe = mysqli_fetch_array($resultat)) {
					$idProfe = $profe['usu_id'];
					$nomProfe = $profe['usu_nom']. " ".$profe['usu_cognoms'];
					echo "
 					<h2>Mestre: <small>$nomProfe</small></h2>";
					
					}
			}     
		}
	}    
	
	// Per treure classe :
	// UPDATE `tbl_nen` SET `cla_id` = NULL WHERE `tbl_nen`.`nen_id` = 1;
 ?>
 <div id="nensClasse"></div>
 <div id="resultadosBusqueda"></div>
 <div id="divBorrar"></div>




<script type="text/javascript">
		function objetoAjax(){
					var xmlhttp=false;
					try {
						xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
					} catch (e) {
				 
						try {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						} catch (E) {
							xmlhttp = false;
						}
					}
				 
					if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
					  xmlhttp = new XMLHttpRequest();
					}
					return xmlhttp;
				}
		function buscadorNensSenseClasse(){
              
              // alert(decisioBusqueda);
              var url = "ajax/ajaxBuscadorNensSenseClasse.php"; // El script a dónde se realizará la petición.
					// alert('fnsdo');
                $.ajax({
                       type: "POST",
                       url: url,
                       // data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#resultadosBusqueda").html(data); // Mostrar la respuestas del script PHP.
                           nensClasse();
                       }
                     });
                return false; // Evitar ejecutar el submit del formulario.
            };
  //           function afegirEliminarNen(idNen){
		// 		  var ajax=objetoAjax();
  //           	  var idClasse = document.getElementById("id").value;
		// 		  ajax.open("GET", "ajax/ajaxAfegirEliminarNen.php?idNen="+idNen+"&idClasse="+idClasse, true);
		// 		  ajax.onreadystatechange=function() {
		// 		  alert("dsafs");
		// 		  	if (ajax.readyState==4) {
		// 		  		alert('exito');
		// 				// document.getElementById('resultadosBusqueda').innerHTML = ajax.responseText;
		// 			}
		// 		  }
  // 				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  // 				ajax.send("busqueda="+busqueda);
		// }
            function afegirEliminarNen(idNen){
              var idClasse = document.getElementById("id").value;
              // alert(decisioBusqueda);
              var url = "ajax/ajaxAfegirEliminarNen.php?idNen="+idNen+"&idClasse="+idClasse; // El script a dónde se realizará la petición.
                $.ajax({
					// alert(url);
                       type: "POST",
                       url: url,
                       // data: {idNen: "idNen", idClasse: "idClasse" },
                       // data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();
                          // $("#divBorrar").html(data);
                          buscadorNensSenseClasse();
                           // $("#resultadosBusqueda").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });
                return false; // Evitar ejecutar el submit del formulario.
            };
			function nensClasse(){
              
              // alert(decisioBusqueda);
              var idClasse = document.getElementById("id").value;
              var url = "ajax/ajaxNensClasse.php?id="+idClasse; // El script a dónde se realizará la petición.
					// alert('fnsdo');
                $.ajax({
                       type: "POST",
                       url: url,
                       // data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#nensClasse").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });
                return false; // Evitar ejecutar el submit del formulario.
            };

            
		// window.onload = buscadorNensSenseClasse;
	</script>
</div>
</body>
</body>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>