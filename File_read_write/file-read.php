<?php
// $open = fopen("file.txt", "r") or die("Unable to open file!"); die method is used for error handling. 
// echo fread($open, filesize("file.txt"));    
// fclose($open);    

// $document=fopen("file.txt","r") or die("Unable to open file!");
// echo fread($document, filesize("file.txt"));
// fclose($document);

echo "<br>";

// echo readfile("file.txt");(read file is used to read the file and it also returns the number of bytes read from the file.It is a built_in function in php);
echo "<br>";
// echo file_get_contents("file.txt");

$result=file_get_contents("file.txt");
echo $result;

?>

