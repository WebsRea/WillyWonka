<!DOCTYPE html>
<html>
<head>
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
<body>
<?php session_start();

include('conexio.php');

$sql = "SELECT * FROM tbl_classe";

$resultat=mysqli_query($conexio, $sql);
				// echo "foisndfuignfdiuog";
	if (mysqli_num_rows($resultat) != 0 ) {
		echo "<h4>Selecciona una classe a editar</h4><br><table><tr>";
		while ($classe = mysqli_fetch_array($resultat)) {
			$id = $classe['cla_id'];
			$nom = $classe['cla_nom'];
			echo "<td><a href='editarClasse.php?id=$id'>    $nom        </a></td>";
			}
		echo "</tr></table>";
	} else {
		//header('location:../../index.php?err=1');
		echo "No hi han classes disponibles :(";
	}                      
?><br><br>
<a href="#" onclick="veureAfegirClasse()">Afegir una classe</a><br><br>
<div id="afegirClasse"></div>
</body>
</html>
