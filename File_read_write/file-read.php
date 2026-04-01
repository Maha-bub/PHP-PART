<?php
$open = fopen("file.txt", "r") or die("Unable to open file!");
echo fread($open, filesize("file.txt"));    
fclose($open);          
?>