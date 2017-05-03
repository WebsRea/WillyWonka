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


				function seleccionarPersonaAccio(){
				  // var ajax=objetoAjax();
				  alert('entro');
				  var persona = 'undefined';
				  var accio = 'undefined';
				if (document.getElementById('nen').checked = true) {
 					persona = document.getElementById('nen').value;
				}else if(document.getElementById('tutor').checked = true){
					persona = document.getElementById('tutor').value;
				}else if(document.getElementById('mestre').checked = true){
					persona = document.getElementById('mestre').value;
				}
				if (document.getElementById('editar').checked = true) {
 					accio = document.getElementById('editar').value;
				}else if(document.getElementById('afegir').checked = true){
					accio = document.getElementById('afegir').value;
				}else if(document.getElementById('eliminar').checked = true){
					accio = document.getElementById('eliminar').value;
				}

				if (persona !== 'undefined' && accio !== 'undefined') {
					alert(accio + persona);
				}
				alert(accio);
				 //  ajax.open("POST", 'filtro_eventos.php', true);
				 //  ajax.onreadystatechange=function() {
				 //  	if (ajax.readyState==4) {
					// 	document.getElementById('total').innerHTML = ajax.responseText;
					// }
				 //  }
  			// 	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  			// 	ajax.send("val="+val);
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

</body>
</html>