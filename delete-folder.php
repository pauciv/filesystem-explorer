<?php

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

function eliminarDir($ruta) { // el parámetro tiene que incluir la ruta del directorio a eliminar
    foreach(glob($ruta . "/*") as $elemento) { // /*: busca todos los archivos y carpetas del directorio a eliminar
        if (is_dir($elemento)) { // si el elemento es un directorio
            eliminarDir($elemento);
        }
        else { // si el elemento es un archivo
            unlink($elemento); // eliminar archivos del interior del directorio
        }
    }
    rmdir($ruta); // elimar directorio ya vacío
}

$msg = null;
if (isset($_POST["delete-folder"])) {
    $ruta = "root/" . $_POST["path"];
    var_dump($ruta);

    if(is_dir($ruta)) {
        eliminarDir($ruta);
        $msg = "Enhorabuena directorio $ruta eliminado correctamente";
    } else {
        $msg = "El directorio $ruta no existe";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Eliminar directorios con PHP</h3>
    <strong><?php echo $msg ?></strong>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <label>Ruta del directorio:</label>
        <input type="text" name="path" required>
        <input type="hidden" name="delete-folder">
        <input type="submit" value="delete">
    </form>
</body>
</html>