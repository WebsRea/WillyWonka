<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery.js"></script>
	
</head>
<body onload="buscadorNensSenseClasse()">
<?php 
	include 'conexio.php';
	extract($_REQUEST);
	echo "<input type='hidden' id='id' value='$id'>";
	$sql = "SELECT * FROM tbl_classe WHERE cla_id = $id";
	$resultat=mysqli_query($conexio, $sql);
				// echo "foisndfuignfdiuog";
	if (mysqli_num_rows($resultat) != 0 ) {
		while ($classe = mysqli_fetch_array($resultat)) {
			$id = $classe['cla_id'];
			$nomClasse = $classe['cla_nom'];
			echo "<h4>$nomClasse</h4>";
			//consulta Profe
			$sql = "SELECT * FROM tbl_usuari WHERE cla_id = $id";
			$resultat=mysqli_query($conexio, $sql);
						// echo "foisndfuignfdiuog";
			if (mysqli_num_rows($resultat) != 0 ) {
				while ($profe = mysqli_fetch_array($resultat)) {
					$idProfe = $profe['usu_id'];
					$nomProfe = $profe['usu_nom']. " ".$profe['usu_cognoms'];
					echo "<h4>Mestre:</h4> $nomProfe";
					
					}
			}     
		}
	}    
	
	// Per treure classe :
	// UPDATE `tbl_nen` SET `cla_id` = NULL WHERE `tbl_nen`.`nen_id` = 1;
 ?>
 <div id="nensClasse"></div>
 <div id="resultadosBusqueda"></div>
 <div id="divBorrar"></div>




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
		function buscadorNensSenseClasse(){
              
              // alert(decisioBusqueda);
              var url = "ajax/ajaxBuscadorNensSenseClasse.php"; // El script a dónde se realizará la petición.
					// alert('fnsdo');
                $.ajax({
                       type: "POST",
                       url: url,
                       // data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#resultadosBusqueda").html(data); // Mostrar la respuestas del script PHP.
                           nensClasse();
                       }
                     });
                return false; // Evitar ejecutar el submit del formulario.
            };
  //           function afegirEliminarNen(idNen){
		// 		  var ajax=objetoAjax();
  //           	  var idClasse = document.getElementById("id").value;
		// 		  ajax.open("GET", "ajax/ajaxAfegirEliminarNen.php?idNen="+idNen+"&idClasse="+idClasse, true);
		// 		  ajax.onreadystatechange=function() {
		// 		  alert("dsafs");
		// 		  	if (ajax.readyState==4) {
		// 		  		alert('exito');
		// 				// document.getElementById('resultadosBusqueda').innerHTML = ajax.responseText;
		// 			}
		// 		  }
  // 				ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  // 				ajax.send("busqueda="+busqueda);
		// }
            function afegirEliminarNen(idNen){
              var idClasse = document.getElementById("id").value;
              // alert(decisioBusqueda);
              var url = "ajax/ajaxAfegirEliminarNen.php?idNen="+idNen+"&idClasse="+idClasse; // El script a dónde se realizará la petición.
                $.ajax({
					// alert(url);
                       type: "POST",
                       url: url,
                       // data: {idNen: "idNen", idClasse: "idClasse" },
                       // data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();
                          // $("#divBorrar").html(data);
                          buscadorNensSenseClasse();
                           // $("#resultadosBusqueda").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });
                return false; // Evitar ejecutar el submit del formulario.
            };
			function nensClasse(){
              
              // alert(decisioBusqueda);
              var idClasse = document.getElementById("id").value;
              var url = "ajax/ajaxNensClasse.php?id="+idClasse; // El script a dónde se realizará la petición.
					// alert('fnsdo');
                $.ajax({
                       type: "POST",
                       url: url,
                       // data: busqueda, // Adjuntar los campos del formulario enviado.
                       success: function(data)
                       {
                          // alert("Usuario añadido correctamente");
                          // $("#lista li").remove();

                          //return llamadaBbdd();

                           $("#nensClasse").html(data); // Mostrar la respuestas del script PHP.
                       }
                     });
                return false; // Evitar ejecutar el submit del formulario.
            };

            
		// window.onload = buscadorNensSenseClasse;
	</script>
</body>
</html>