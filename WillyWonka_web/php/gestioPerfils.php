<!DOCTYPE html>
<html>
<head>
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
<body>
nen<input type="radio" name="persona" id="nen" value="nen" onclick="seleccionarPersonaAccio()">
tutor<input type="radio" name="persona" id="tutor" value="tutor" onclick="seleccionarPersonaAccio()">
mestre<input type="radio" name="persona" id="mestre" value="mestre" onclick="seleccionarPersonaAccio()">
<br><br>
editar<input type="radio" name="accio" id="editar" value="editar" onclick="seleccionarPersonaAccio()">
afegir<input type="radio" name="accio" id="afegir" value="afegir" onclick="seleccionarPersonaAccio()">
eliminar<input type="radio" name="accio" id="eliminar" value="eliminar" onclick="seleccionarPersonaAccio()">
<br><br>
<div id="ajaxPrincipal"></div><br>


</body>
</html>