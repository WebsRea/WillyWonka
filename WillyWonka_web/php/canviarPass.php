<?php session_start();

	if (!isset($_SESSION['usu_id'])) {
		header('Location:../index.php');
	}


?>

<form action="procs/canviarPass.proc.php">
	Contrasenya antiga:
	<input type="password" name="pass_antiga"><br><br>
	Nova contrasenya:
	<input type="password" name="pass_nova1"><br>
	Repetir nova contrasenya:
	<input type="password" name="pass_nova2"> <br>
	<input type="submit" name="Canviar">

</form>



<?php  
	if (isset($_SESSION['errors'])) {
		echo "<h3 style='color:red'>".$_SESSION['errors']."</h3>";
		unset($_SESSION['errors']);
	}
	



?>