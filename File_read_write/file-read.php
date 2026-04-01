<?php
// $open = fopen("file.txt", "r") or die("Unable to open file!"); die method is used for error handling. 
// echo fread($open, filesize("file.txt"));    
// fclose($open);    

$document=fopen("file.txt","r");
echo fread($document, filesize("file.txt"));
fclose($document);
?>

?>