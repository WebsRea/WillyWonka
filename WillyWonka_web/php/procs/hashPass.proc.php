<?php 
extract($_REQUEST);

$pass = hash('sha512', $pass);
echo "Contraseña hasheada: <br> $pass";



 ?>