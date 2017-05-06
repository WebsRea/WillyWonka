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
						<form action='procs/editarTutor.proc.php'><br><br>
						nom:
						<input type='text' name='nom' value='$nom'><br>
						cognoms:
						<input type='text' name='cognoms' value='$cognoms'><br>
						Mail:
						<input type='text' name='mail' value='$mail'><br>
						<a href='procs/resetPass.proc.php?id=$id'>Clica per resetejar la contrasenya (serà 123 fins que la canvíin)</a><br>
						<input type='hidden' name='id' value='$id'><br>
						<input type='submit' value='Modificar'>
					";
				}
				echo "</table>";
			}else{echo "No hi han dades :'(";}

 ?>