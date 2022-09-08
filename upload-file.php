<?php

require_once "index.php";

$file = $_FILES["file-to-upload"]; 
print_r($file);
echo "<br>";

$fileName = $_FILES["file-to-upload"]["name"];
echo "$fileName" ,"<br>";

# $filePath = $fileDestination . basename($fileName);
// echo "$filePath" ,"<br>";

$fileName = $_FILES["file-to-upload"]["name"];
$fileTmpName = $_FILES["file-to-upload"]["tmp_name"]; // tmp_name: como todavía no hemos subido el archivo, lo guarda temporalmente en el ordenador.
# $fileSize = $_FILES["file-to-upload"]["size"];
$fileError = $_FILES["file-to-upload"]["error"];
# $fileType = $_FILES["file-to-upload"]["type"];
# $fileType = $_FILES["file-to-upload"]["full_path"];

$filePoint = explode(".", $fileName); # = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 
$fileExtension = strtolower(end($filePoint));
echo "$fileExtension", "<br>";

if ($fileError === 0) {
    $targetFolder = $_POST["target-folder"];
    echo "$targetFolder";
    $fileDestination = "./root/$targetFolder/" . $fileName;
    #uniqid()// para prevenir que alguien sobreescriba un archivo al subir uno con el mismo nombre.
    move_uploaded_file($fileTmpName, $fileDestination); //location, destination
    header("Location: index.php?uploadsuccess");
} else {
    echo "Error!";
}