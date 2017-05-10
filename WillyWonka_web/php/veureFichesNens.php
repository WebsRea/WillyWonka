<!DOCTYPE html>
<html>
<head>
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
	<title></title>
</head>
<body onload="buscadorFichaNenClasse()">
Buscar:<br>
<input type="text" id="buscadorClasse" onkeyup="buscadorFichaNenClasse()"><br>
<div id="resultadosBusquedaClasse"></div>

<a href="#" onclick="obrirBuscador()">Veure tots els nens</a>
<div id="obrirBuscador"></div>
<div id="resultadosBusqueda"></div>

</body>
</html>