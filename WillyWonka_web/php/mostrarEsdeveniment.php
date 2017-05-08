<?php session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];
include '/conexio.php';
	?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div>
<?php
$sql = "SELECT * FROM tbl_esdeveniments WHERE `esd_data` >= DATE_SUB(CURDATE(),INTERVAL 0 DAY);";
	$esdeveniments=mysqli_query($conexio, $sql);
    if (mysqli_num_rows($esdeveniments) != 0){
      while ($esdeveniment = mysqli_fetch_array($esdeveniments)) {
		$titol = $esdeveniment['esd_titol'];
		$descripcio = $esdeveniment['esd_text'];
	
		?>
<table style="border: 1px;">
	<tr>
		<?php 
			echo "
			<th>$titol</th></tr>
			<tr><th>$descripcio</th></tr>
			";
		?>
</tr>
</table>
</div>
</body>
</html>
