<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		include "includes_admin/head.php";
	?>
	<title>Gestió de classes</title>
	<script src="http://code.jquery.com/jquery.js"></script>
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

        function buscadorMestreClasse(){
				  var ajax=objetoAjax();
				  var busqueda = document.getElementById('buscador').value;
				  ajax.open("POST", "ajax/ajaxBusquedaMestreLliure.php?busqueda="+busqueda, true);
				  // alert(busqueda);
				  ajax.onreadystatechange=function() {
				  	if (ajax.readyState==4) {
				  		// alert('fdsf');
						document.getElementById('resultadosBusqueda').innerHTML = ajax.responseText;
					}
				  }
  				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				ajax.send("busqueda="+busqueda);
		}
			function veureAfegirClasse(){
              
              // alert(decisioBusqueda);
              var url = "ajax/ajaxAfegirClasse.php"; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url,
                       // data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#afegirClasse").html(data); // Mostrar la respuestas del script PHP.
                           buscadorMestreClasse();
                       }
                     });
                return false; // Evitar ejecutar el submit del formulario.
            };
	</script>

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
                    <a href="#" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Documents</a>
                    <a href="#" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
                </div>
            </div>
            <div class="container">
                <h4 class="h4inicio">
                <div class="row">
                <?php 
                echo "Perfecte! modifiquem alguna classe " . $_SESSION['usu_nom'] . " o prefereixes  <a href='../index.php'><i class='fa fa-power-off' aria-hidden='true'> Sortir</i></a> ?<br>";
                ?>
                </div>
                </h4>
            </div>

        </div>
    </nav>
    <!-- /.nav -->
   
    <div class="jumbotron frase">

    	<div class="container padmin">
        <div class="row">

    	<?php 

    	include('conexio.php');

			$sql = "SELECT * FROM tbl_classe";

			$resultat=mysqli_query($conexio, $sql);
				// echo "foisndfuignfdiuog";
			if (mysqli_num_rows($resultat) != 0 ) {
				echo "<h2 class='h2fam'>LES NOSTRES CLASSES<br><small class='h2fam'>Clica al nom de la classe per obtenir més informació</small></h2>
              <br>";
				while ($classe = mysqli_fetch_array($resultat)) {
					$id = $classe['cla_id'];
					$nom = $classe['cla_nom'];
          $foto_classe = $classe['cla_foto'];

					echo "
                <div class='col-md-4'>
                <img src='../img/icon/$foto_classe'>
                <br><br><a  class='h2fam' href='editarClasse.php?id=$id'> $nom  </a>
                </div>
                ";
					}
				echo "";
			} else {
				//header('location:../../index.php?err=1');
				echo "<img src='../img/icon/006-la-computacion-en-nube-1.png'> No hi han classes disponibles <img src='../img/icon/001-sad.png'>";
			}                      
		?>
        </div>

    		
		</div> 
	</div>
  <div class="container">
  <div class="col-md-4"></div>
  <div class="col-md-4 psom">

      <a href="#" onclick="veureAfegirClasse()" class="psom" ><b>Afegir una classe</b></a><br><br>
  </div>

      <div id="afegirClasse" class="psom">
        
      </div>
   </div>
  </div>
    
</body>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>
