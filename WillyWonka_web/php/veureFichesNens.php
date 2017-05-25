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
		
		function obrirBuscador(){
              // alert(decisioBusqueda);
              var url = "ajax/ajaxObrirBuscador.php"; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url,
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#obrirBuscador").html(data); // Mostrar la respuestas del script PHP.
                           buscadorFichaNen();
                       }
                     });

                return false; // Evitar ejecutar el submit del formulario.
            };
        function buscadorFichaNen(){
				  var ajax=objetoAjax();
				  var busqueda = document.getElementById('buscador').value;
				  ajax.open("POST", "ajax/ajaxBuscadorFichaNen.php?busqueda="+busqueda, true);
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

		function buscadorFichaNenClasse(){
				  var ajax=objetoAjax();
				  var busqueda = document.getElementById('buscadorClasse').value;
				  ajax.open("POST", "ajax/ajaxBuscadorFichaNenClasse.php?busqueda="+busqueda, true);
				  // alert(busqueda);
				  ajax.onreadystatechange=function() {
				  	if (ajax.readyState==4) {
				  		// alert('fdsf');
						document.getElementById('resultadosBusquedaClasse').innerHTML = ajax.responseText;
					}
				  }
  				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				ajax.send("busqueda="+busqueda);
		}
</script>
	
</head>
<body onload="buscadorFichaNenClasse()">
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
                    <a href="afegirActivitat.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Activitats</a>
                    <a href="modificarStock.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Stock</a>
                    <a href="contacteMestre.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
                    <a href="records.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Records</a>
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
	<h2 class="h2fam">FITXA DELS INFANTS <br><small class="peque">Aquí pots veure la fitxa dels nens de la teva classe <br><small class="peque">o clica veure tots els nens si estàs fent substitucions</small></small></h2>
</div>
<div class="container psom">
		Buscar:<br>
		<input type="text" id="buscadorClasse" onkeyup="buscadorFichaNenClasse()"><br>
		<div id="resultadosBusquedaClasse"></div>

		<a href="#" onclick="obrirBuscador()">Veure tots els nens</a>
		<div id="obrirBuscador"></div>
		<div id="resultadosBusqueda"></div>
</div>

</body>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>