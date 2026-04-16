<?php
$index = $_GET['index'];
$img = $_GET['img'];

$rows = file("db.txt");

// remove row
unset($rows[$index]);

file_put_contents("db.txt", implode("", $rows));

// delete image file
$filePath = "uploads/".$img;
if(file_exists($filePath)){
    unlink($filePath);
}

header("Location: admin.php");
?>