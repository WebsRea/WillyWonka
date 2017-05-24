<?php 

//session_start();
extract($_REQUEST);


$usu_id = $_SESSION['usu_id'];
$usu_tipus = $_SESSION['usu_tipus'];

echo "$usu_tipus ojo al dato reconozco que es mestre pero en cambio entro en el primer iiiiiiiif lo pongo por en medio para que se vea que pilla el tipus correcto pero en cambio ha entrado en el if de admin";
include 'conexio.php';


if ($_SESSION['usu_tipus'] = 'admin') {
	$sql = "SELECT * FROM tbl_esdeveniments ORDER BY esd_data_ini DESC";
   $results=mysqli_query($conexio,$sql);
      if ($row = mysqli_fetch_array($results)){ 
         echo "<table class='table-hover'> \n"; 
         echo "<tr class='datos_tabla padmin'><td>" .$usu_tipus. "Titol</td><td>&nbsp;&nbsp;Descripció</td><td>&nbsp;&nbsp;Inici</td><td>&nbsp;&nbsp;Fi</td></tr> \n"; 
         do { 
            echo "<tr class='info'><td>".$row["esd_titol"]."</td><td>&nbsp;&nbsp;".$row["esd_text"]."</td><td>&nbsp;&nbsp;".$row["esd_data_ini"]."</td><td>&nbsp;&nbsp;".$row["esd_data_fin"]."</td></tr> \n"; 
         } while ($row = mysqli_fetch_array($results)); 
         echo "</table> \n"; 
      } else { 
      echo "<img src='../img/icon/001-sad.png'> No hi ha cap registre!"; 
      } 

}else{

      $sql_otro="SELECT * FROM tbl_esdeveniments WHERE now() BETWEEN esd_data_ini AND esd_data_fin OR esd_data_ini <= NOW() + INTERVAL 1 WEEK AND esd_data_fin >= NOW() + INTERVAL 1 WEEK ORDER BY esd_data_ini DESC"; 

      $results=mysqli_query($conexio,$sql_otro);
      if ($row = mysqli_fetch_array($results)){ 
         echo "<table class='table-hover'> \n"; 
         echo "<tr class='datos_tabla padmin'><td>Titol</td><td>&nbsp;&nbsp;Descripció</td><td>&nbsp;&nbsp;Inici</td><td>&nbsp;&nbsp;Fi</td></tr> \n"; 
         do { 
            echo "<tr class='info'><td>".$row["esd_titol"]."</td><td>&nbsp;&nbsp;".$row["esd_text"]."</td><td>&nbsp;&nbsp;".$row["esd_data_ini"]."</td><td>&nbsp;&nbsp;".$row["esd_data_fin"]."</td></tr> \n"; 
         } while ($row = mysqli_fetch_array($results)); 
         echo "</table> \n"; 
      } else { 
      echo "<img src='../img/icon/001-sad.png'> No hi ha cap registre!"; 
      } 
}

?> 
