<?php //NO OLVIDARSE DE PONER SESIONES!!!
session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
          	<h4 class="modal-title">Afegir Event</h4>
		</div>
		<div class="modal-body">
			<form name="anadirEvento" action="/procs/agregarEvento.proc.php">
				Nom del projecte:
				<input type="textArea" name="esd_titol"><br><br>
				Descripció:<br>
				<textarea name="esd_text" maxlength="500"></textarea><br><br>
				Dia de l'event:
				<input type="date" name="esd_data"><br><br>
				
		</div>
		<div class="modal-footer">
				<input type="submit" class="btn btn-success" name="enviar">
			</form>
		</div>
	</div>
</div>

	



</body>
</html>