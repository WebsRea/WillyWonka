

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

            function canviarPass(){
              // alert("fdisom");
              var url = "ajax/ajaxCanviarPass.php"; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#meterPass").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });

                return false; // Evitar ejecutar el submit del formulario.
            };

            function noCanviarPass(){
              // alert("fdisom");
              var url = "ajax/ajaxNoCanviarPass.php"; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#meterPass").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });

                return false; // Evitar ejecutar el submit del formulario.
            };
            // function comprobar(){
            //   var email = document.getElementById('correu');
            //   var pass1 = document.getElementById('usu_pass1');
            //   if (email.value !== "" || pass1.value !== "" ) {
            //     alert("gogogo");
            //   } else {
            //     alert("nope");
            //     return false;
            //   }
            // }
		
			
	</script>
</head>
<body>
<div style="color:red">
	<?php session_start();
	if (isset($_SESSION['error'])) {
		echo $_SESSION['error'];
	}
	 ?>
</div>
<form action="procs/editarPerfilPropi.proc.php">
	<div><?php 
  if (isset($_SESSION['error'])) {
      echo $_SESSION['error']; 
      unset($_SESSION['error']);
    }

  ?></div>
	<div id="meter">
		Correu: <input type="email" name="usu_mail" id="correu" disabled><br><a href="#" onclick="canviarMail()">Vull canviar el email</a>
	</div>
	Antiga contrasenya:
	<input type="password" name="pass_antigua">
	<div id="meterPass">
		Contrasenya: <input type="password" name="usu_pass1" id="pass1" disabled><br>
		Repetir contrasenya: <input type="password" name="usu_pass2" id="pass2" disabled><br>
		<a href="#" onclick="canviarPass()">Vull canviar la contrasenya</a>
	</div>
	<input type="submit" name="enviar" value="enviar">

	<!-- Correu: <div id="divMail"><input type="email" id="correuCheckbox" name="usu_mail"></div>
	<div id="textCanviar">
		<a href="#" id="textolalalala"><text id="frase">Vull canviar el email</text></a></div> -->
</form>
</body>
</html>