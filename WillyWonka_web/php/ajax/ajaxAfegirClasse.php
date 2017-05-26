<?php 
include('../conexio.php');
echo ' 
		<div class="row">
			<div class="form-group">
				<label class="psom">Cercador: <small>Utilitza el cercador per trobar de forma ràpida un mestre<br> i seleccional al desplegable inferior </label><br>
				<img src="../img/icon/001-la-computacion-en-nube-6.png"> <input type="text" id="buscador" onkeyup="buscadorMestreClasse()">
			</div>
		</div>
		<div class="row">
			<div class="form-group">
					<label class="psom">Selecciona mestre: <small>Utilitza el desplegable per trobar de forma ràpida un mestre</label>
				<form action="procs/afegirClasse.proc.php"  class="psom">
						<div id="resultadosBusqueda">
							<select name="mestreId"></select>
						</div>
		
							<label class="psom">Nom de la classe: </label> <input type="text" name="cla_nom"><br>
							
							<label class="psom">Franja: </label> <input type="number" name="cla_curs" min="0" max="3"><br>

							<label class="psom">Foto per la classe:</label>
							';
							$sql="SELECT * FROM tbl_img_cla";
								
							$results=mysqli_query($conexio,$sql);
							if (mysqli_num_rows($results) != 0){
								while ($foto = mysqli_fetch_array($results)) {
									$imgVer = "../img/pack/".$foto["imgCla_ruta"];
									$img = $foto["imgCla_ruta"];
									echo '
									<input type="radio" name="cla_foto" value="'.$img.'" checked><img src="'.$imgVer.'">
									';
								}
							}



							echo '
							<br>
							<input type="submit" value="enviar" class="btn btn-willy text-center btn-lg">
					
			</div>	

';








// ../img/pack/
 ?>
	
