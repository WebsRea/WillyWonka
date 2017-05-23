<?php
		
	//Conecta con la base de datos
		 // $conexio = mysqli_connect('mysql.hostinger.es', 'u464252147_wonka', 'EMRrtf977', 'u464252147_wonka');
		$conexio = mysqli_connect('localhost', 'root', '', 'bd_willy_wonka');

	//Establece el set de caracteres UTF-8
		$acentos = mysqli_query($conexio, "SET NAMES 'utf8'");

	//Si no se conecta correctamente salta error
		 if (!$conexio) {
		     echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		     echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
		     echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		     exit;
		 }
?>

