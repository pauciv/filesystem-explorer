<?php

$root = scandir("./root/");
// print_r($root);
// echo "<pre>";
// var_dump($root);
// echo "</pre>";

foreach ($root as $item) {
    echo "<li><a href=''>$item</a></li>";
}
