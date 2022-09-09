<?php

$rootFolders = scandir("./root/");
// print_r($root);
// echo "<pre>";
// var_dump($root);
// echo "</pre>";

foreach ($rootFolders as $folder) {
    echo "<li><a href=''>$folder</a></li>";
}
