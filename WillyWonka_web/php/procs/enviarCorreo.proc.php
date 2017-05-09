<?php session_start();
$usu_id = $_SESSION['usu_id'];
$usu_nom = $_SESSION['usu_nom'];
extract($_REQUEST);
//Aquí recogeremos:
//mail_correu
//mail_asunto
//mail_missatge



$to = $mail_correu;
$subject = $mail_asunto;
$txt = $mail_missatge;
$headers = "From: $usu_nom (no contestar)";

mail($to,$subject,$txt,$headers);
?>
