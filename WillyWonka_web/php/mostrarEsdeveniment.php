<?php session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];
include '/conexio.php';
	?>
<!DOCTYPE html>

<html> 
<body> 
  <div>
<?php 

$sql="SELECT * FROM tbl_esdeveniments WHERE now() BETWEEN esd_data_ini AND esd_data_fin OR esd_data_ini <= NOW() + INTERVAL 1 WEEK AND esd_data_fin >= NOW() + INTERVAL 1 WEEK ORDER BY esd_data_ini DESC"; 
$results=mysqli_query($conexio,$sql);
if ($row = mysqli_fetch_array($results)){ 
   echo "<table border = '1'> \n"; 
   echo "<tr><td>Titol</td><td>Descripció</td><td>Data Inicial</td><td>Data Final</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["esd_titol"]."</td><td>".$row["esd_text"]."</td><td>".$row["esd_data_ini"]."</td><td>".$row["esd_data_fin"]."</td></tr> \n"; 
   } while ($row = mysqli_fetch_array($results)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
  </div>
</body> 
</html>
