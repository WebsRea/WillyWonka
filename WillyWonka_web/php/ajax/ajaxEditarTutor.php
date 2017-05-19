<?php 

extract($_REQUEST);
include('../conexio.php');


$sql = "SELECT * FROM tbl_usuari WHERE usu_id = $id AND usu_tipus = 'tutor'";
			$resultat = mysqli_query($conexio, $sql);
			if (mysqli_num_rows($resultat) != 0 ) {
				while ($usu = mysqli_fetch_array($resultat)) {
					$nom = $usu['usu_nom'];
					$cognoms = $usu['usu_cognoms'];
					$mail = $usu['usu_mail'];
					$pass = $usu['usu_pass'];
					echo "
						<div class='jumbotron frase'><h2 class='h2fam'>Recorda:<small class='peque'> si modifiques la contrasenya no quedaran guardats la resta de canvis</small></h2></div>
						<form action='procs/editarTutor.proc.php'><br><br>
						<div class='col-md-4'></div>
						<div class='col-md-4'>
							<div class='form-group'>
		                    	<label>Nom</label>
						<input type='text' name='nom' value='$nom' class='form-control'>
						<label>Cognoms</label>
						<input type='text' name='cognoms' value='$cognoms' class='form-control'>
						<label>Mail</label>
						<input type='text' name='mail' value='$mail' class='form-control'>
						<a href='procs/resetPass.proc.php?id=$id'>Clica per resetejar la contrasenya (serà 123 fins que la canvíin)</a><br>
						<input type='hidden' name='id' value='$id'><br>
						<input type='submit' value='Modificar' class='btn btn-willy text-center'>
					";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}

 ?>