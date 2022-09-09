<!-- <p>Choose a folder:</p>
        <select name="target-folder" id="">
            
        </select> -->

<?php

$rootFolders = scandir("./root/");

foreach ($rootFolders as $folder) {
    echo "<option value=''>$folder</option>";
}
