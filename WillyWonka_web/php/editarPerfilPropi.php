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

		function canviarMail(){
			var ajax=objetoAjax();
			ajax.open("POST", 'ajax/ajaxCanviarMail.php?id=', true);
			ajax.onreadystatechange=function() {
			alert('dfins');
				if (ajax.readyState==4) {
					document.getElementById('textCanviar').innerHTML = ajax.responseText;
				}
			}
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		}

		function noCanviarMail(){
			var ajax=objetoAjax();

			ajax.open("POST", 'ajax/ajaxNoCanviarMail.php?id=', true);
			ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
					document.getElementById('textCanviar').innerHTML = ajax.responseText;
				}
			}
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		}

		
	</script>
</head>
<body>
<form action="procs/editarPerfilPropi.proc.php">
	<div id="textCanviar">
	Correu: <input type="email" name="usu_mail" disabled="true"><br>
	<a href="#" onclick="canviarMail()">Vull canviar el email</a></div>
</form>
</body>
</html>