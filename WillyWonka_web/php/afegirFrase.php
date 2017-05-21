<?php //NO OLVIDARSE DE PONER SESIONES!!!
//session_start(); NO NECESITA LA SESIÓN PORQUE SE INCLUYE EN INDEX_ADMIN Y YA TIENE LA SESIÓN
$usu_id = $_SESSION['usu_id'];
//echo "$usu_id";
?>
<div class="col-md-4"></div>
<div class="col-md-4">
	<br>
    <br>
    <form name="anadirEvento" action="procs/afegirFrase.proc.php">
        <div class="form-group">
            <input type="textArea" name="frase_text" class="form-control" placeholder="Pensa una frase molt WONKAAA">
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-3">  
            <input type="submit" class="btn btn-willy text-center" name="Enviar">
            <br>
            <br>
        </div> 
    </form>
</div>
