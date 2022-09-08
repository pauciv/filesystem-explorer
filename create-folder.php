<?php

require_once "index.php";

// Create a folder inside root 
$folderName = $_POST["folder-name"];
mkdir("./root/" . "$folderName", 0777);
header("Location: index.php?createsuccess");