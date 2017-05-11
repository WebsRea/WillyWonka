<!-- <?php session_start();

	$usu_id = $_SESSION['usu_id'];

	$sql = "SELECT * FROM tbl_usuari WHERE usu_id = $usu_id";

	$resultat = mysqli_query($conexio, $sql);

	if (mysqli_num_rows($resultat) != 0 ) {
		while ($usu = mysqli_fetch_array($resultat)) {

		}
	}


 ?> -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script type="text/javascript">

		function canviarMail(){
              // alert("fdisom");
              var url = "ajax/ajaxCanviarMail.php"; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#meter").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });

                return false; // Evitar ejecutar el submit del formulario.
            };

            function noCanviarMail(){
              // alert("fdisom");
              var url = "ajax/ajaxNoCanviarMail.php"; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#meter").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });

                return false; // Evitar ejecutar el submit del formulario.
            };

		
			
	</script>
</head>
<body>
<form action="procs/editarPerfilPropi.proc.php">
	
	<div id="meter">
		Correu: <input type="email" name="usu_mail" disabled><br><a href="#" onclick="canviarMail()">Vull canviar el email</a>
	</div>


	<!-- Correu: <div id="divMail"><input type="email" id="correuCheckbox" name="usu_mail"></div>
	<div id="textCanviar">
		<a href="#" id="textolalalala"><text id="frase">Vull canviar el email</text></a></div> -->
</form>
</body>
</html>