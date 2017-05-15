<?php session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];

include 'conexio.php';

$sql="SELECT * FROM tbl_frase ORDER BY frase_data DESC LIMIT 1";
$resultat = mysqli_query($conexio, $sql);
// echo "$sql";
if (mysqli_num_rows($resultat) != 0){
	while ($fra = mysqli_fetch_array($resultat)) {
		echo $fra['frase_text'];
	}
}else{
	echo "No hay ninguna frase disponible";
}


?>