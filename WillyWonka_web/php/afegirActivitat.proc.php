<?php session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];

include '../conexio.php';


$sql="SELECT * FROM tbl_usuari WHERE usu_id = $usu_id"; //
$results=mysqli_query($conexio,$sql);
if (mysqli_num_rows($results) != 0){
	while ($usu = mysqli_fetch_array($results)) {
		$result = $usu['cla_id'];
	}
}
$query = "INSERT INTO `tbl_activitats` (`act_titol`, `act_data`, `act_text`, `cla_id`) VALUES ('$act_titol', '$act_data', '$act_text', '$result')";
$resultados=mysqli_query($conexio,$query);
header('Location:../mestre.php');
 ?>