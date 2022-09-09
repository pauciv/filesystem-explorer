<?php

// echo __DIR__ . "<br>";
// echo __FILE__ . "<br>";

$rootFolders = scandir("./root/");
// print_r($root);
// echo "<pre>";
// var_dump($root);
// echo "</pre>";

foreach ($rootFolders as $folder) {
    if ($folder != "." && $folder != "..") {
        ?>

        <div class="folder">
            <li><a href=""><?php echo $folder ?></a></li>

            <div class="rename-delete">
                <a href="" class="<?php echo $folder ?>">rename</a>
                <a href="delete-folder.php" class="<?php echo $folder ?>">delete</a>
            </div>
        </div>

        <?php
    }
}
?>
