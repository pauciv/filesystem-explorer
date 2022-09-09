<?php

require_once "index.php";

$file = $_FILES["file-to-upload"]; 
print_r($file);
echo "<br>";

# $filePath = $fileDestination . basename($fileName);
// echo "$filePath" ,"<br>";

$fileName = $file["name"];
$fileTmpName = $file["tmp_name"]; // tmp_name: como todavía no hemos subido el archivo, lo guarda temporalmente en el ordenador.
# $fileSize = $file["size"];
$fileError = $file["error"];
# $fileType = $file["type"];
# $fileType = $file["full_path"];

# $filePoint = explode(".", $fileName); # = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); 
# $fileExtension = strtolower(end($filePoint));
# echo "$fileExtension", "<br>";

if ($fileError === 0) {
    $targetFolder = $_POST["target-folder"];
    echo "$targetFolder";
    $fileDestination = "./root/$targetFolder/$fileName";
    #uniqid()// para prevenir que alguien sobreescriba un archivo al subir uno con el mismo nombre.
    move_uploaded_file($fileTmpName, $fileDestination); //location, destination
    header("Location: index.php?uploadsuccess");
} else {
    echo "Error!";
}