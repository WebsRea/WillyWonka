<?php session_start();
extract($_REQUEST);



$usu_id = $_SESSION['usu_id'];
include '../conexio.php';
$sql = "INSERT INTO `tbl_activitats` (`act_id`, `act_titol`, `act_data`, `act_text`, `cla_id`) VALUES (NULL, '$act_titol', $act_data', '$act_text', NULL);";
 echo "$sql";
mysqli_query($conexio, $sql);


header('Location:../mestre.php');



 ?>