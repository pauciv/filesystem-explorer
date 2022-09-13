<?php 
require_once "functions.php"; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Filesystem Explorer</title>
</head>

<body>

    <header>
        <h1>FsEx</h1>
        <form action="">
            <input type="text" />
            <input type="submit" value="Search" />
        </form>
    </header>

    <main>
        <section class="root-section">
            <ul>
                <?php listItems($rootFolders); ?>
            </ul>
        </section>

        <section class="folders-section">
            <ul>
                <?php listItems($folderContent); ?>
                <?php // listSub($folderContent, $path); ?>
            </ul>
        </section>

        <section class="info-section"></section>
    </main>

    <form action="./functions.php" method="post">
        <input type="text" name="folder-to-create" />
        <input type="submit" value="Create Folder" name="create" />
    </form>

    <form action="./functions.php" method="post" enctype="multipart/form-data">
        <p>Select a file:</p>
        <input type="file" name="file-to-upload" />
        <p>Choose a folder:</p>
        <select name="target-folder" id="" require>
            <?php selectItem($rootFolders); ?>
        </select>
        <input type="submit" value="Upload File" name="upload-file" /> <!-- antes era name="submit" pero creo que no lo estabamos usando. -->
    </form>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <p>Select a folder to Rename:</p>
        <select name="folder-to-rename" id="">
            <?php selectItem($rootFolders); ?>
        </select>
        <input type="text" name="new-folder-name" />
        <input type="submit" value="Rename" name="rename" />
    </form>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]?>">
        <p>Select a folder to Delete:</p>
        <select name="folder-to-delete" id="">
            <?php selectItem($rootFolders); ?>
        </select>
        <input type="submit" value="Delete" name="delete" />
    </form>

</body>

</html>