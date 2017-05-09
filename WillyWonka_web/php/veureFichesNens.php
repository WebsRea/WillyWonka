<!DOCTYPE html>
<html>
<head>
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
</script>
	<title></title>
</head>
<body onload="buscadorFichaNen()">
Buscar:<br>
<input type="text" id="buscador" onkeyup="buscadorFichaNen()"><br>
<div id="resultadosBusqueda"></div>

</body>
</html>