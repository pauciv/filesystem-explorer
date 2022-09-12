<?php

// VARIABLES to be passed as parameters when calling functions in index.html
$rootFolders = scandir("./root/");

// CREATE FOLDER (inside root) ________________________________________________
if (isset($_POST["folder-to-create"])) {
    $folderToCreate = $_POST["folder-to-create"];
    mkdir("./root/" . "$folderToCreate", 0777);
    header("Location: index.php?foldercreated");
}

// UPLOAD FILE FUNCTION ________________________________________________________
if (isset($_POST["upload-file"])) {
    $file = $_FILES["file-to-upload"]; 
    // print_r($file);
    // echo "<br>";

    # $filePath = $fileDestination . basename($fileName);
    // echo "$filePath" ,"<br>";

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"]; // tmp_name: como todavía no hemos subido el archivo, lo guarda temporalmente en el ordenador.
    $open = fopen("img6.jpg", "r");
    $size = $filesize("img6.jpg");
    echo $size;
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
        header("Location: index.php?fileuploaded");
    } else {
        echo "Error!";
    }
}

// LIST ITEMS FUNCTION _________________________________________________________
// echo __DIR__ . "<br>";
// echo __FILE__ . "<br>";

function listItems($items) {
    foreach ($items as $item) {
        if ($item != "." && $item != "..") {
            ?>
    
            <div class="folder">
                <li><a href=""><?php echo $item ?></a></li>
    
                <div class="rename-delete">
                    <a href="" class="rename-<?php echo $item ?>">rename</a>
                    <a href="delete-folder.php" class="delelte-<?php echo $item ?>">delete</a>
                </div>
            </div>
    
            <?php
        }
    }
}
// _____________________________________________________________________________

// SELECT ITEMS FUNCTION _______________________________________________________
function selectItem($items) {
    foreach ($items as $item) {
        if ($item != "." && $item != "..") {
            ?>
    
            <option value="<?php echo $item ?>">
                <?php echo $item ?>
            </option>
    
            <?php
        }
    }
}

// _____________________________________________________________________________

// DELETE FOLDERS FUNCTION ____________________________________________________
function deleteDir($ruta) { // el parámetro tiene que incluir la ruta del directorio a eliminar
    foreach(glob($ruta . "/*") as $elemento) { // /*: busca todos los archivos y carpetas del directorio a eliminar
        if (is_dir($elemento)) { // si el elemento es un directorio
            deleteDir($elemento);
        }
        else { // si el elemento es un archivo
            unlink($elemento); // eliminar archivos del interior del directorio
        }
    }
    rmdir($ruta); // elimar directorio ya vacío
}

$msg = null;
if (isset($_POST["delete"])) {
    $ruta = "root/" . $_POST["folder-to-delete"]; // $_POST["path"] --> 
    var_dump($ruta);

    if(is_dir($ruta)) {
        deleteDir($ruta);  // se ejecuta la función
        $msg = "Enhorabuena directorio $ruta eliminado correctamente";
    } else {
        $msg = "El directorio $ruta no existe";
    }
}

// $folderName = $_POST["folder-name"];
// rmdir("./root/" . "$folderName");
// header("Location: index.php?createsuccess");

// $folder = "root/" . $_POST["path"];
// $files = glob($folder . "/*");
// print_r($files);

// foreach($files as $file) {
//     if (is_file($file)) {
//         unlink($file);
//     }
// }

// function deleteAll($dir) {
//     foreach(glob($dir . "/*") as $file) {
//         if (is_dir($file)) {
//             deleteAll($file);
//         } else {
//             unlink($file);
//         }
//     }
//     rmdir($dir);
// }

// deleteAll("ola");

//si la class y el nombre de la carpeta son iguales
// _____________________________________________________________________________