<?php 
extract($_REQUEST);
$nombre = $name;
$msg=$message; 


// $para = 'proyectos.websrea@gmail.com'; 
 
$asunto = "Correo de: " . $nombre . ". Mail: " . $email;
$msg = $asunto . "\n\n\n\n" . $msg;
// mail($para, $asunto, utf8_decode($mensaje), $header); 
mail("proyectos.websrea@gmail.com",$asunto,$msg);
echo 'mensaje enviado correctamente'; 

?>