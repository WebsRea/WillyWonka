<?php session_start();

switch ($_SESSION['usu_tipus']) {
	case 'admin':
		header('Location:adminPrincipal.php');
		break;
	case 'mestre':
		header('Location:mestrePrincipal.php');
		break;
	case 'tutor':
		header('Location:tutorPrincipal.php');
		break;
	
	default:
		header('Location:/procs/destroysesion.proc.php');
		break;
}




 ?>