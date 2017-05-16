<?php session_start();

switch ($_SESSION['usu_tipus']) {
	case 'admin':
		header('Location:index_admin.php');
		break;
	case 'mestre':
		header('Location:index_mestre.php');
		break;
	case 'tutor':
		header('Location:index_tutor.php');
		break;
	
	default:
		header('Location:/procs/destroysesion.proc.php');
		break;
}




 ?>