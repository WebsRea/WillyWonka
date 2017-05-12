<?php session_start();
extract($_REQUEST);

//SELECT * FROM tbl_activitats INNER JOIN tbl_usuari ON tbl_activitats. cla_id WHERE tbl_usuari. cla_id

//SELECT tbl_activitats.cla_id FROM tbl_activitats INNER JOIN tbl_usuari ON tbl_activitats.cla_id = tbl_usuari.cla_id

//SELECT tbl_usuari.cla_id FROM tbl_usuari INNER JOIN tbl_activitats ON tbl_usuari.cla_id = tbl_activitats.cla_id

$usu_id = $_SESSION['usu_id'];
echo "$usu_id";
include '../conexio.php';
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
//header('Location:../mestre.php');
 ?>