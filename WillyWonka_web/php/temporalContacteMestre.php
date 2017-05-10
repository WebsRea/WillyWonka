<?php session_start();
include '/conexio.php';
$usu_id = $_SESSION['usu_id'];
$usu_nom = $_SESSION['usu_nom'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Contacto</title>
</head>
<body>
	<form name="sentMessage" id="contactForm" action="procs/enviarCorreo.proc.php" novalidate>
        <label for="email">Receptor</label>
        	<select id="selectProfe"  name="mail_correu">
        	<?php 
        	include '../conexio.php';
				$usu_id = $_SESSION['usu_id'];
				echo "$usu_id";
				$sqlAdmin="SELECT * FROM tbl_usuari where usu_tipus = 'admin'";
								$resultsAdmin=mysqli_query($conexio,$sqlAdmin);
								if (mysqli_num_rows($resultsAdmin) != 0){
									while ($usuAdmin = mysqli_fetch_array($resultsAdmin)) {
										$nomAdmin = $usuAdmin['usu_nom']." ".$usuAdmin['usu_cognoms'];
										$mailAdmin = $usuAdmin['usu_mail'];
										echo "<option value=$mailAdmin>$nomAdmin</option>";
											
									}
								}
        	?>
        	<?php 
        	// Hay que filtrar los tutores según si el hijo esta o no en la clase del maestro
				$usu_id = $_SESSION['usu_id'];
				echo "$usu_id";
				$sqlAdmin="SELECT * FROM tbl_usuari where usu_tipus = 'tutor'";
								$resultsTutor=mysqli_query($conexio,$sqlTutor);
								if (mysqli_num_rows($resultsTutor) != 0){
									while ($usututor = mysqli_fetch_array($resultsTutor)) {
										$nomTutor = $usuTutor['usu_nom']." ".$usuTutor['usu_cognoms'];
										$mailTutor = $usuTutor['usu_mail'];
										echo "<option value=$mailTutor>$nomTutor</option>";
											
									}
								}
        	?>