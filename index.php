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


    <form action="./create-folder.php" method="post">
        <input type="text" name="folder-name" />
        <input type="submit" value="Create Folder" name="submit" />
    </form>

    <form action="./upload-file.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file-to-upload" />

        <label>
            Choose a folder:
            <input type="text" name="target-folder" required />
        </label>

        <input type="submit" value="Upload File" name="submit" />
    </form>

    <main>
        <section class="root-section">
            <ul>
                <?php require_once "list-folders.php"; ?>
            </ul>
        </section>

        <section class="folders-section"></section>

        <section class="info-section"></section>

    </main>

</body>

</html>