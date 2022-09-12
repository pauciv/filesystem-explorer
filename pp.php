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