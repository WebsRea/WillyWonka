<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Contacto</title>
</head>
<body>
	<form name="sentMessage" id="contactForm" novalidate>
        <label for="email">Receptor</label>
        	<select id="selectProfe" name="selectProfe">
        	<?php 
				include '../conexio.php';
				$usu_id = $_SESSION['usu_id'];

        		$sql="SELECT * FROM tbl_familia where (usu_id1 = $usu_id OR usu_id2 = $usu_id)";
				$results=mysqli_query($conexio,$sql);
				if (mysqli_num_rows($results) != 0){
					while ($usu = mysqli_fetch_array($results)) {
						$fam_id = $usu['fam_id'];
						$sqlN="SELECT * FROM tbl_nen where  fam_id = $fam_id";
						$resultsN=mysqli_query($conexio,$sqlN);
						if (mysqli_num_rows($resultsN) != 0){
							while ($nen2 = mysqli_fetch_array($resultsN)) {
								$cla_id = $nen2['cla_id'];
								$sqlU="SELECT * FROM tbl_usuari where cla_id = $cla_id";
								$resultsU=mysqli_query($conexio,$sqlU);
								if (mysqli_num_rows($resultsU) != 0){
									while ($usu2 = mysqli_fetch_array($resultsU)) {
										$nomProfe = $usu2['usu_nom']." ".$usu2['usu_cognoms'];
										$mailProfe = $usu2['usu_mail'];

											
									}
								}
							}
						}	
					}
				}


        	 ?>
        		
  <option value="" selected="selected">- Selecciona a tu profesor-</option>
  <option value="profe1@gmail.com">Profe1</option>
  <option value="profe2@gmail.com">Profe2</option>
  <option value="profe3@gmail.com">Profe3</option>
  <option value="profe4@gmail.com">Profe4</option>
</select>
        	</select>
        <label for="email">Asunto</label>   
         <input type="text" class="form-control" placeholder="Asunte" name="mail_asunto" required data-validation-required-message="Per favor, introdueixi un asunte pel missatge.">    
        
        <label for="message">Missatge</label>
            <textarea rows="5" class="form-control" placeholder="Missatge" name="mail_missatge" required data-validation-required-message="Per favor, introdueixi el seu missatge."></textarea>  
                <br>
        <button type="submit" class="btn btn-success btn-lg">Envia</button>
                       
    </form>

</body>
</html>