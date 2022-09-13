<?php
/*$path = "img6.jpg";
$open = fopen("$path", "r");
    $size = filesize("index.php");
    echo $size;
    $read = fread($open, $size);
    echo $read;*/
    
    // (A) GET IMAGE INFO
    // $file = "img8.jpg";
    // $fileData = exif_read_data($file);
     
    // // (B) OUTPUT HTTP HEADERS
    // header("Content-Type: " . $fileData["MimeType"]);
    // header("Content-Length: " . $fileData["FileSize"]);
     
    // // (C) READ FILE
    // readfile($file);

   explode("." , "img6.jpg", -1 );
   var_dump(explode("." , "img6.jpg"));
   echo end(explode("." , "img6.jpg" ));
    // ?>
   