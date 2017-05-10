<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script type="text/javascript">
		function buscarCorreus(){
			var busqueda = document.getElementById('buscador').value;
			// alert(decisioBusqueda);
			var url = "ajax/ajaxContacteAdmin.php?busqueda="+busqueda; // El script a dónde se realizará la petición.
			// alert(busqueda);
			$.ajax({
				type: "POST",
				url: url,
				data: busqueda, // Adjuntar los campos del formulario enviado.
				success: function(data)
				{

					$("#resultadosBusqueda").html(data); // Mostrar la respuestas del script PHP.
				}
			});

			return false; // Evitar ejecutar el submit del formulario.
		};
	</script>
</head>
<body onload="buscarCorreus()">
<form action="procs/enviarCorreo.proc.php">
	
	Filtrar correus per tipus o nom: <br>
	<input type="text" id="buscador" onkeyup="buscarCorreus()"><br>
	<div id="resultadosBusqueda"></div><br>

	Títol:<br>
	<input type="text" name="mail_asunto"><br>
	Text: <br><textarea name="mail_missatge" style="min-width: 300px;min-height: 100px;"></textarea><br>
	<input type="submit" name="enviar" value="enviar">
</form>
</body>
</html>