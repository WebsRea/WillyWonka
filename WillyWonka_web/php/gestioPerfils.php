<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		include "includes_admin/head.php";
	?>
	<title>gestio Perfils</title>
	<!-- <script src=”jquery/jquery-3.2.1.min.js” type=”text/javascript”></script> -->
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

			

				function buscador1(){
              var busqueda = document.getElementById('buscador').value;
              var decisioBusqueda = document.getElementById('decisio').value;
              // alert(decisioBusqueda);
              var url = "ajax/ajaxBusqueda.php?busqueda="+busqueda+"&decisioBusqueda="+decisioBusqueda; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url,
                       data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#resultadosBusqueda").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });

                return false; // Evitar ejecutar el submit del formulario.
            };

            

            function buscadorEliminarNen(){
              var busqueda = document.getElementById('buscador').value;
              var decisioBusqueda = document.getElementById('decisio').value;
              // alert(decisioBusqueda);
              var url = "ajax/ajaxBusquedaEliminarNen.php?busqueda="+busqueda+"&decisioBusqueda="+decisioBusqueda; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url,
                       data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#resultadosBusqueda").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });

                return false; // Evitar ejecutar el submit del formulario.
            };

            
            function editarNen(id){
				  var ajax=objetoAjax();
				 
				  ajax.open("POST", 'ajax/ajaxEditarNen.php?id='+id, true);
				  ajax.onreadystatechange=function() {
				  	if (ajax.readyState==4) {
						document.getElementById('editarPerfil').innerHTML = ajax.responseText;
					}
				  }
  				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				ajax.send("id="+id);
				}


				function editarTutor(id){
				  var ajax=objetoAjax();
				 
				  ajax.open("POST", 'ajax/ajaxEditarTutor.php?id='+id, true);
				  ajax.onreadystatechange=function() {
				  	if (ajax.readyState==4) {
				  		// alert('fdsf');
						document.getElementById('editarPerfil').innerHTML = ajax.responseText;
					}
				  }
  				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				ajax.send("id="+id);
				}

				function editarMestre(id){
				  var ajax=objetoAjax();
				 
				  ajax.open("POST", 'ajax/ajaxEditarMestre.php?id='+id, true);
				  ajax.onreadystatechange=function() {
				  	if (ajax.readyState==4) {
				  		// alert('fdsf');
						document.getElementById('editarPerfil').innerHTML = ajax.responseText;
					}
				  }
  				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				ajax.send("id="+id);
				}

				function eliminarNen(id){
				  var ajax=objetoAjax();
				 
				  ajax.open("POST", 'ajax/ajaxEliminarNen.php?id='+id, true);
				  		// alert('sadsa');
				  ajax.onreadystatechange=function() {
				  	if (ajax.readyState==4) {
						document.getElementById('eliminarPerfil').innerHTML = ajax.responseText;
					}
				  }
  				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				ajax.send("id="+id);
				}

				function eliminarUsu(id){
				  var ajax=objetoAjax();
				 
				  ajax.open("POST", 'ajax/ajaxEliminarUsu.php?id='+id, true);
				  ajax.onreadystatechange=function() {
				  	if (ajax.readyState==4) {
				  		// alert('fdsf');
						document.getElementById('eliminarPerfil').innerHTML = ajax.responseText;
					}
				  }
  				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				ajax.send("id="+id);
				}

			function seleccionarPersonaAccio(){
				  //alert('entro');
				  var persona = 'undefined';
				  var ajax=objetoAjax();
				  var accio = 'undefined';
				  var decisio = 'undefined';
				if (document.getElementById('nen').checked == true) {

 					if (document.getElementById('editar').checked == true) {
 						decisio = 'editarNen';
					}else if(document.getElementById('afegir').checked == true){
						decisio = 'afegirNen';
					}else if(document.getElementById('eliminar').checked == true){
						decisio = 'eliminaNen';
					}
				}else if(document.getElementById('tutor').checked == true){

					if (document.getElementById('editar').checked == true) {
						decisio = 'editarTutor';
					}else if(document.getElementById('afegir').checked == true){
						decisio = 'afegirTutor'; 						
					}else if(document.getElementById('eliminar').checked == true){
						decisio = 'eliminaTutor'; 		
					}
				}else if(document.getElementById('mestre').checked == true){

					if (document.getElementById('editar').checked == true) {
						decisio = 'editarMestre';	 					
					}else if(document.getElementById('afegir').checked == true){
						decisio = 'afegirMestre'; 		
					}else if(document.getElementById('eliminar').checked == true){
						decisio = 'eliminaMestre';
					}
				}
				// alert(decisio);
				if (decisio !== 'undefined') {
				  ajax.open("POST", 'ajax/ajaxGestioPerfil.php?decisio='+decisio, true);
				  ajax.onreadystatechange=function() {
						// alert('sduinco');
				  	if (ajax.readyState==4) {
						document.getElementById('ajaxPrincipal').innerHTML = ajax.responseText;
						buscador1();
					}
				}
				//alert(accio);
				 //  }
  				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				ajax.send(decisio);
				}
			}
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
                <a href="#inicio"><img class="img-responsive" src="../img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="gestioPerfils.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Perfils </a>
                    <a href="gestioClasses.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Classes</a>
                    <a href="#" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Esdeveniments</a>
                    <a href="#" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
                    <a href="#" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
                </div>
            </div>
            <div class="container">
                <h4 class="h4inicio">
                <div class="row">
                <?php 
                echo "Perfecte! modifiquem alguns perfils " . $_SESSION['usu_nom'] . " o prefereixes  <a href='../index.php'><i class='fa fa-power-off' aria-hidden='true'> Sortir</i></a> ?<br>";
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
    			<div class="col-md-6">
	    			<h2>Quin usuari vols modificar?</h2>
	    			<input type="radio" name="persona" id="nen" value="nen" onclick="seleccionarPersonaAccio()">
		    		<label><img src="../img/icon/001-ciguena.png"> Nen</label>
					<br>
					<input type="radio" name="persona" id="tutor" value="tutor" onclick="seleccionarPersonaAccio()">
					<label><img src="../img/icon/002-construccion.png"> Familiar </label>
					<br>
					<input type="radio" name="persona" id="mestre" value="mestre" onclick="seleccionarPersonaAccio()">
					<label><img src="../img/icon/001-educacion.png"> Mestre </label>
				</div>
		
				<div class="col-md-6">
					<h2>Qué vols fer amb ell?</h2>
					<input type="radio" name="accio" id="afegir" value="afegir" onclick="seleccionarPersonaAccio()">
					<label><img src="../img/icon/006-usuario.png">Afegir</label>
					<br>
					<input type="radio" name="accio" id="editar" value="editar" onclick="seleccionarPersonaAccio()">
					<label><img src="../img/icon/008-lapiz.png">Editar</label>
					<br>
					<input type="radio" name="accio" id="eliminar" value="eliminar" onclick="seleccionarPersonaAccio()">
					<label><img src="../img/icon/003-usuario-1.png">Eliminar</label>
					
				</div>
			</div>
		</div> 
	</div>
		<br><br>
	<div class="container padmin">
		<div class="row">
			<div id="ajaxPrincipal">
			</div>
		</div>
	</div>

	<div class="jumbotron frase">
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