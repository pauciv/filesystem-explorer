<?php

// LIST ROOT ITEMS & SUBITEMS FUNCTIONS _________________________________________________________
// echo __DIR__ . "<br>";
// echo __FILE__ . "<br>";

function listItems($items) {
    foreach ($items as $item) {
        if ($item != "." && $item != "..") {
            ?>

            <div class="folder">
                <li><a href="index.php?name=<?php echo $item ?>"><?php echo $item ?></a></li>
    
                <!-- <div class="rename-delete">
                    <a href="" class="rename-<?php //echo $item ?>">rename</a>
                    <a href="delete-folder.php" class="delelte-<?php //echo $item ?>">delete</a>
                </div> -->
            </div>

            <?php
        }
    }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
        <input type="text" name="folder-to-create" />
        <input type="submit" value="Create Folder" name="create" />
    </form>

    <?php
}

function listSubItems($items) {
    // $path = $_GET["name"];
    ?>
    
    <h2><?php echo $_GET["name"]; ?></h2>

    <?php
    foreach ($items as $item) {
        if ($item != "." && $item != "..") {
            // if (is_dir($item)) {
                ?>

                <div class="folder">
                    <li><a href="index.php?name=<?php echo $_GET["name"]; ?>/<?php echo $item ?>"><?php echo $item ?></a></li>
                </div>

                <?php
            // }
            
        }
    }

    ?>

    <!-- Create Folder Form -->
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="create-form">
        <input type="text" name="folder-to-create" />
        <input type="hidden" value="<?php echo $_GET["name"]; ?>" name="target-folder" />
        <input type="submit" value="Create Folder" name="create" />
    </form>

    <!-- Upload File Form -->
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" class="upload-file-form">
        <input type="file" name="file-to-upload" />
        <input type="hidden" value="<?php echo $_GET["name"]; ?>" name="target-folder" />
        <input type="submit" value="Upload File" name="upload-file" /> <!-- antes era name="submit" pero creo que no lo estabamos usando. -->
    </form>

    <!-- Rename Folder Form -->
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>" class="rename-form">
        <input type="text" name="new-folder-name" />
        <input type="hidden" value="<?php echo $_GET["name"]; ?>" name="target-folder" />
        <input type="submit" value="Rename Folder" name="rename" />
    </form>

    <!-- Delete Folder Form -->
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>" class="rename-form">
        <input type="hidden" value="<?php echo $_GET["name"]; ?>" name="target-folder" />
        <input type="submit" value="Delete Folder" name="delete" class="delete-button" />
    </form>

    <?php
}

// CREATE FOLDER (inside root) ________________________________________________
if (isset($_POST["create"])) {
    $folderToCreate = $_POST["folder-to-create"];
    $targetFolder = $_POST["target-folder"];
    mkdir("./root/$targetFolder/$folderToCreate", 0777);

    if (isset($_POST["target-folder"])) {
        header("Location: index.php?name=$targetFolder");
    } else {
        header("Location: index.php?action=foldercreated"); // podemos obtener el action con el get.
    }
}

// UPLOAD FILE ________________________________________________________________
if (isset($_POST["upload-file"])) { // si no coge el isset, usar !empty en lugar de isset.
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
        # echo "$targetFolder";
        $fileDestination = "./root/$targetFolder/$fileName";
        #uniqid()// para prevenir que alguien sobreescriba un archivo al subir uno con el mismo nombre.
        move_uploaded_file($fileTmpName, $fileDestination); //location, destination

        if (isset($_POST["target-folder"])) {
            header("Location: index.php?name=$targetFolder");
        } else {
            header("Location: index.php?action=fileuploaded");
        }

    } else {
        echo "There was an error uploading your file.";
    }
}

// RENAME FOLDER _______________________________________________________________
// TODO: Resolver error al renombrar subcarpetas.
if (isset($_POST["rename"])) {
    $targetFolder = $_POST["target-folder"];
    $folderToRename = "$targetFolder"; 
    $newFolderName = $_POST["new-folder-name"];
    rename("./root/$folderToRename", "./root/$newFolderName");

    $urlName = $_GET["name"];
    $folderContent = scandir("$newFolderName");
    listSubItems($folderContent); 

    header("Location: index.php?name=$newFolderName");
}

// DELETE FOLDERS FUNCTION _____________________________________________________
function deleteDir($path) { // el parámetro tiene que incluir la ruta del directorio a eliminar
    foreach(glob($path . "/*") as $item) { // /*: busca todos los archivos y carpetas del directorio a eliminar
        if (is_dir($item)) { // si el elemento es un directorio
            deleteDir($item);
        }
        else { // si el elemento es un archivo
            unlink($item); // eliminar archivos del interior del directorio
        }
    }
    rmdir($path); // elimar directorio ya vacío
}

if (isset($_POST["delete"])) {
    $path = "root/" . $_POST["target-folder"]; // $_POST["path"] --> 

    if(is_dir($path)) {
        deleteDir($path);  // se ejecuta la función
        header("Location: index.php?action=$path");
    }
}

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