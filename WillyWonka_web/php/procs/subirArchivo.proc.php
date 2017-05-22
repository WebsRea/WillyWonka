<?php
include '../conexio.php';
extract($_REQUEST);
switch ($tipus_arxiu) {
	case 'circular':
		$target_dir = "../arxius/circular/";
		$doc_tipus = "circular";
		break;
	case 'documentacio_inicial':
		$target_dir = "../arxius/documentacio_inicial/";
		$doc_tipus = "documentacio_inicial";
		break;
	case 'menu':
		$target_dir = "../arxius/menu/";
		$doc_tipus = "menu";
		break;
	
	default:
		echo "ERROR DE RUTAS";
		break;
}

$hoy = date("m.d.y.H.i.s");

$target_file = $target_dir . $hoy . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 12582912) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql = "INSERT INTO `tbl_document` (`doc_id`, `doc_tipus`, `doc_nom`, `doc_ruta`) VALUES (NULL, '$doc_tipus', '$doc_titol', '$target_file');";
        $results=mysqli_query($conexio,$sql);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>