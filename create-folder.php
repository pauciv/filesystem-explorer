<?php

require_once "index.php";

$root = "./root/";

// Create a folder inside root 
$folderName = $_POST["folder-name"];
mkdir("$root" . "$folderName", 0777);
header("Location: index.php?createsuccess");