<?php session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];

include '../conexio.php';


$sql="SELECT * FROM tbl_usuari WHERE usu_id = $usu_id"; //
$results=mysqli_query($conexio,$sql);

// Falta hacer el bucle para que siempre salga la frase más reciente.
$query = "INSERT INTO `tbl_frase` (`frase_text`, `frase_data`, `usu_id`) VALUES ('$frase_text', now(), '$usu_id')";
$resultados=mysqli_query($conexio,$query);
//header('Location:../admin.php');
 ?>