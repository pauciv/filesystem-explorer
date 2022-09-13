<?php

// while ($item !== false) {
                if ($item != "." && $item != "..") {
                    $path = $folderName . "/" . $item;
                    ?>
    
                    <div class="folder">
                        <li><a href="index.php?name=<?php echo $path ?>"><?php echo $item ?></a></li>
                    </div>
        
                    <?php
                    
                    echo '<div class="folder">
                    <li><a href="index.php?name=<?php echo $path ?>"><?php echo $item ?></a></li>
                </div>';
                }
    
            // }


// PRUEBASSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS

function listSub($items, $p) {
    foreach ($items as $item) {
        if ($item != "." && $item != "..") {
            ?>

            <div class="folder">
                <li><a href="index.php?name=<?php echo $p ?>"><?php echo $item ?></a></li>
            </div>

            <?php
        }
    }
    // $p = $p . "/" . $_GET["name"]; 
}

# $openFolderContent = scandir("./root." . $_GET["name"]);

function listSubItems($path) {
    // if (isset($_GET["name"])) {
        $folderName = $_GET["name"];

        // if (is_dir($folderName)) {
            $folderOpened = opendir($path);
            while ($item = readdir($folderOpened)) {
                $newPath = $path."/".$item;
                if (is_dir($newPath) && $item != "." && $item != "..") {
                    echo "Found Folder $newPath <br>";
                    listSubItems($newPath);
                } else {
                    ?>

                    <!-- <div class="folder">
                        <li><a href="index.php?name=<?php echo $item ?>"><?php echo $item ?></a></li>
                    </div> -->

                    <?php
                }
            }

            
        // }
    // }
}

$path = "/";
echo "$path <br>";
listSubItems($path);

// PRUEBASSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS