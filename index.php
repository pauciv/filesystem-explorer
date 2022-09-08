<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filesystem Explorer</title>
</head>

<body>
    <h1>Filesystem Explorer</h1>

    <form action="./create-folder.php" method="post">
        <input type="text" name="folder-name" />
        <input type="submit" value="Create Folder" name="submit" />
    </form>

    <form action="./upload-file.php" method="post" enctype="multipart/form-data">
        <label>
            <input type="file" name="file-to-upload" />
        </label>
        <input type="text" name="target-folder" />
        <input type="submit" value="Upload File" name="submit" />
    </form>

</body>

</html>