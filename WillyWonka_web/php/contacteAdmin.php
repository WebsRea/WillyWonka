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
<body id="inicio">

    <!-- Empezamos con el nav -->
    <nav class="navbar navbar-fixed-top navegador"  role="navigation">
        <div class="container">
            <!-- Creamos el header del menu -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" >
                    <span class="sr-only">Alternar menu</span>
                    <img src="../img/001-chocolate.png"></img>               
                </button>
                <a href="#inicio"><img class="img-responsive" src="../img/LogoWW_SD.png" alt=""></a>
            </div>
            <!-- Links del menu -->
            <div class="collapse navbar-collapse align-right" id="navbar1">
                 <div class="nav navbar-nav botonesnav">
                    <a href="gestioPerfils.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Perfils </a>
                    <a href="gestioClasses.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Classes</a>
                    <a href="afegirEsdeveniment.php" class="btn btn-willy btn-lg">
                    <img src="../img/001-chocolate.png"></img>Esdeveniments</a>
                    <a href="subirArchivo.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Documents</a>
                    <a href="contacteAdmin.php" class="btn btn-willy btn-lg" >
                    <img src="../img/001-chocolate.png"></img> Contacte</a>
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
<body onload="buscarCorreus()">

<div class="jumbotron frase">
	<h2 class="h2fam">Envia emails als diferents usuaris <br><small class="peque">Recorda que el tipus d'usuari existent es admin tutor o mestre</small></h2>
</div>
<div class="container">
	<div class="col-md-4"></div>
        <div class="col-md-5 ">
			<form action="procs/enviarCorreo.proc.php">
				<div class="form-group padmin">
					<input type="text" id="buscador" onkeyup="buscarCorreus()" ><br>
                    <label for="tipus_usu">Cerca segons el tipus d'usuari o el nom:</label>
					<div id="resultadosBusqueda"></div><br>
				</div>
                <div class="form-group padmin">
					<label for="asuntomail">Assumpte de  l'email:</label><br>
					<input type="text" name="mail_asunto" placeholder="Assumpte" class="form-control">
				</div>
				<div class="form-group padmin">
				<label for="text">Text de l'email:</label><br>
				<textarea name="mail_missatge" " placeholder="El vostre Missatge" class="form-control"></textarea><br>
				</div>
				<div class="col-md-3"></div> 
                <div class="col-md-3">  
				<input type="submit" name="enviar" value="enviar" class="btn btn-willy text-center">
				</div> 
			</form>

		</div>
</div>
</body>
<br><br>
<footer class="footer">
  <?php
  include "includes_admin/footer.php";
  ?>
</footer>
</html>