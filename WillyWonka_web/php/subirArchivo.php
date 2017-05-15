<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="procs/subirArchivo.proc.php" method="post" enctype="multipart/form-data"> 
   	<b>Seleccioni que vol pujar:</b> 
   	<br> 
      <select name="tipus_arxiu">
         <option value="circular">Circular</option>
         <option value="menu">Menú</option>
         <option value="documentacio_inicial">Documentació Inicial</option>
      </select> 
   	<br> 
      <b>Seleccioni que vol pujar:</b> <br>
      <input type="text" name="doc_titol"><br>
   	<b>Enviar un nuevo archivo: </b> 
   	<br> 
   	<input type="file" name="fileToUpload" id="fileToUpload">
   	<br> 
   	<input type="submit" value="Enviar"> 
</form>
</body>
</html>