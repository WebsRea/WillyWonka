<!DOCTYPE html>
<html>
<head>
	<title>Modificar Stock</title>
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


function carregar(){
	var url = "ajax/ajaxModificarStock.php"; // El script a dónde se realizará la petición.
	// alert("iofdsnubgyv");
	$.ajax({
		type: "POST",
		url: url, // Adjuntar los campos del formulario enviado.
		success: function(data)
		{
			$("#stockNens").html(data); // Mostrar la respuestas del script PHP.
		}
	});

	return false; // Evitar ejecutar el submit del formulario.
};



function modStock(stonen_id,quantitat){
	var url = "ajax/ajaxBusqueda.php?stonen_id="+stonen_id+"&quantitat="+quantitat; // El script a dónde se realizará la petición.
	$.ajax({
		type: "POST",
		url: url, // Adjuntar los campos del formulario enviado.
		success: function(data)
		{
			$("#resultadosBusqueda").html(data); // Mostrar la respuestas del script PHP.
		}
	});

	return false; // Evitar ejecutar el submit del formulario.
};



		
	</script>
</head>
<body onload="carregar()">
<div id="stockNens"></div>

</body>
</html>