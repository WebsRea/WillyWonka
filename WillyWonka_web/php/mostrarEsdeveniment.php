<?php session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];
include '/conexio.php';
	?>
<!DOCTYPE html>

<html> 
<body> 
  
<?php 

$sql="SELECT esd_titol, esd_text FROM tbl_esdeveniments ORDER BY esd_data DESC"; 
$results=mysqli_query($conexio,$sql);
if ($row = mysqli_fetch_array($results)){ 
   echo "<table border = '1'> \n"; 
   echo "<tr><td>Titol</td><td>Descripció</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["esd_titol"]."</td><td>".$row["esd_text"]."</td></tr> \n"; 
   } while ($row = mysqli_fetch_array($results)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
  
</body> 
</html>