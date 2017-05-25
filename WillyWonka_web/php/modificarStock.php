<!DOCTYPE html>
<html lang="cat">
<head>
    <?php
        session_start();
        
        include "conexio.php";

        $sql = "SELECT * FROM tbl_usuari WHERE usu_id = " . $_SESSION['usu_id'];
        $resultat=mysqli_query($conexio, $sql);
                    // echo "foisndfuignfdiuog";
        if (mysqli_num_rows($resultat) != 0 ) {
            while ($usuari = mysqli_fetch_array($resultat)) {
                $_SESSION['usu_id'] = $usuari['usu_id'];
                $_SESSION['usu_tipus'] = $usuari['usu_tipus'];
                if ($_SESSION['usu_id'] == $usuari['usu_id'] AND $usuari['usu_tipus'] == 'admin') {
                    //echo "Hola, " . $_SESSION['usu_nom'] . " ets un/a " . $_SESSION['usu_tipus'] . ".<br>";
                }
                //echo "<a href='gestioPerfils.php'>Gestionar Perfils</a>";
            }
        } else {
            header('location:../../index.php?err=1');
        }                      
    ?>
    <?php
        include "includes_admin/head.php";

    ?>

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

function modStock1(stonen_id,quantitat){
	alert(stonen_id);
	alert(quantitat);
	var ajax=objetoAjax();

	ajax.open("POST", 'ajax/ajaxEditarStonen.php?stonen_id='+stonen_id+'&quantitat='+quantitat, true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			// document.getElementById('oculto').innerHTML = ajax.responseText;
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("stonen_id="+stonen_id+"quantitat="+quantitat);
};


function modStock(stonen_id,quantitat){
		// alert("nbifusdgusdfiod");
	var url = "ajax/ajaxEditarStonen.php?stonen_id="+stonen_id+"&quantitat="+quantitat; // El script a dónde se realizará la petición.
	$.ajax({
		type: "POST",
		url: url, // Adjuntar los campos del formulario enviado.
		success: function(data)
		{
			// alert("estoy dentro");
			carregar();
		}
	});

	return false; // Evitar ejecutar el submit del formulario.
};



		
	</script>
</head>
<body onload="carregar()">
	  <!-- Empezamos con el nav -->
    <nav class="navbar navbar-fixed-top navegador"  role="navigation">
        <div class="container">
            <!-- Creamos el header del menu -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" >
                    <span class="sr-only">Alternar menu</span>
                    <img src="../img/001-chocolate.png"></img>               
                </button>
                <a href="index_mestre.php"><img class="img-responsive" src="../img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="veureFichesNens.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Perfils </a>
                    <a href="afegirActivitat.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Activitats</a>
                    <a href="modificarStock.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Stock</a>
                    <a href="contacteMestre.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
                    <a href="records.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Records</a>
                </div>
            </div>
            <div class="container">
                <h4 class="h4inicio">
                <div class="row">
                <?php 
                echo "Sigues benvingut, " . $_SESSION['usu_nom'] . " et quedes amb mi o prefereixes  <a href='../index.php'><i class='fa fa-power-off' aria-hidden='true'> Sortir</i></a> ?<br>";
                ?>
                </div>
                </h4>
            </div>

        </div>
    </nav>
    <!-- /.nav -->
   	<div class="jumbotron frase">
   		<h2 class="h2fam">CONTROLA L'ESTOC</h2>

   	</div>
   	<div class="container">
   	<div id="stockNens"></div>
   	</div>

</body>
</html>