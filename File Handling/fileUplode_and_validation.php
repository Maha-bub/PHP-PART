<?php
if($_SERVER['REQUEST_METHOD']==="POST"){
    $filename=$_FILES['file']['name'];
    $fileLocation=$_FILES['file']['tmp-name'];
    $filetype=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $folder="img/";

    if(empty($filename)){
        echo "Please select a file!";
    }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File uplode and validation</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="" placeholder="File Name" id=""> <br>
        <input type="file" name="file">
        <input type="submit" name="file_Submit" value="Upload">

        
    </form>
</body>
</html>