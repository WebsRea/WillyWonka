<?php 
echo '
Buscar: <br><input type="text" id="buscador" onkeyup="buscadorMestreClasse()"><br>
<form action="procs/afegirClasse.proc.php">
<div id="resultadosBusqueda">
<select name="mestreId"></select>
</div>
Nom:<br><input type="text" name="cla_nom"><br>
Curs:<br><input type="number" name="cla_curs" min="0" max="3"><br>
<input type="submit" value="enviar">
';
 ?>
	
