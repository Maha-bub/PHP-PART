<?php
$index = $_GET['index'];
$img = $_GET['img'];

$file = "data.txt";
$rows = file($file);

// row delete
unset($rows[$index]);
file_put_contents($file, implode("", $rows));

// image delete
$imgPath = "img/".$img;
if(file_exists($imgPath)){
    unlink($imgPath);
}

header("Location: main.php");
?>