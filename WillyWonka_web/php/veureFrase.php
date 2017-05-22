<?php 
//session_start(); no necesita el session porque va como include en la veb index_admin (de momento)
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];

include 'conexio.php';

$sql="SELECT * FROM tbl_frase ORDER BY frase_data DESC LIMIT 1";
$resultat = mysqli_query($conexio, $sql);
// echo "$sql";
if (mysqli_num_rows($resultat) != 0){
	while ($fra = mysqli_fetch_array($resultat)) {
		echo "<h1 class='h1som'>" .$fra['frase_text']. "</h1>";
	}
}else{
	echo "<h1 class='h1som'><img src='../img/icon/001-sad.png'>No n'hi ha cap frase disponible</h1>";
}


?>