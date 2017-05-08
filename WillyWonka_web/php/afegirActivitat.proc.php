<?php session_start();
extract($_REQUEST);

//SELECT * FROM tbl_activitats INNER JOIN tbl_usuari ON tbl_activitats. cla_id WHERE tbl_usuari. cla_id

//SELECT tbl_activitats.cla_id FROM tbl_activitats INNER JOIN tbl_usuari ON tbl_activitats.cla_id = tbl_usuari.cla_id

//SELECT tbl_usuari.cla_id FROM tbl_usuari INNER JOIN tbl_activitats ON tbl_usuari.cla_id = tbl_activitats.cla_id

$usu_id = $_SESSION['usu_id'];
echo "$usu_id";
include '../conexio.php';
$cla_id = "";
$query = "SELECT `cla_id` FROM `tbl_usuari` WHERE usu_id = $usu_id";
// echo "$query";
$result = mysqli_query($conexio, $query);

$row=mysqli_fetch_row($result);
echo "<td>".$row[cla_id]."</td>";

//$cla_id = mysqli_query($conexio, $query);
$sql = "INSERT INTO `tbl_activitats` (`act_titol`, `act_data`, `act_text`, `cla_id`) VALUES ('$act_titol', '$act_data', '$act_text', '$result');";
 echo "$sql";
mysqli_query($conexio, $sql);


// header('Location:../mestre.php');



 ?>