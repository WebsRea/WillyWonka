<!DOCTYPE html>
<html>
<head>
	<title>gestio Perfils</title>
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

			function buscador(){
				var ajax=objetoAjax();
				var busqueda = document.getElementById('buscador').value;
				// alert(busqueda);
				ajax.open("POST", 'ajax/ajaxBusqueda.php?busqueda='+busqueda, true);
				ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
					// alert('sduinco');
				document.getElementById('resultadosBusqueda').innerHTML = ajax.responseText;
				}
				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  				// ajax.send(decisio);

				}
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
						decisio = 'eliminarTutor'; 		
					}
				}else if(document.getElementById('mestre').checked == true){

					if (document.getElementById('editar').checked == true) {
						decisio = 'editarMestre';	 					
					}else if(document.getElementById('afegir').checked == true){
						decisio = 'afegirMestre'; 		
					}else if(document.getElementById('eliminar').checked == true){
						decisio = 'eliminarMestre';
					}
				}
				// alert(decisio);
				if (decisio !== 'undefined') {
				  ajax.open("POST", 'ajax/ajaxGestioPerfil.php?decisio='+decisio, true);
				  ajax.onreadystatechange=function() {
						// alert('sduinco');
				  	if (ajax.readyState==4) {
						document.getElementById('ajaxPrincipal').innerHTML = ajax.responseText;
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
<div id="ajaxPrincipal"></div>

</body>
</html>