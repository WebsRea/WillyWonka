<?php session_start();

if (isset($_SESSION['usu_id'])) {

session_destroy();
header('Location:../login.php');
}
echo "error cerrar sesion"
?>