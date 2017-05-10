<!DOCTYPE html>
<html>
<head>
	<title>Suro</title>
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
		function afegirSuro(){
              // alert(decisioBusqueda);
              var url = "ajax/ajaxAfegirSuro.php"; // El script a dónde se realizará la petición.
                $.ajax({
                       type: "POST",
                       url: url,
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#afegirSuro").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });

                return false; // Evitar ejecutar el submit del formulario.
            };
	</script>
</head>
<body>
<h2>Suro</h2>
<a href="#" onclick="afegirSuro()">Afegir una entrada</a>
<div id="afegirSuro"></div>
<?php 

include "conexio.php";
$sql = "SELECT * FROM `tbl_suro` ORDER BY sur_data DESC";
$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				while ($suro = mysqli_fetch_array($resultat)) {
					echo "<b>" . $suro['sur_titol'] . "</b> Data: ".$suro['sur_data']."<br>";
					$idPare = $suro['usu_id'];
					$sqlPare = "SELECT * FROM `tbl_usuari` where usu_id = $idPare";
					$resultatPare = mysqli_query($conexio, $sqlPare);
					if (mysqli_num_rows($resultatPare) != 0 ) {
						while ($pare = mysqli_fetch_array($resultatPare)) {
							echo "Autor: " . $pare['usu_nom'] . " ". $pare['usu_cognoms'] . "<br>"; 
						}
					}
					echo $suro['sur_text'] . "<br><br>";
				}
			}else{echo "Encara no ha escrit ningú, sigues el primer!";}

 ?>

</body>
</html>