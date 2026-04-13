<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $fileName=$_FILES['file']['name'];
    $fileLocation=$_FILES['file']['tmp_name'];
    $fileType=pathinfo($fileName,PATHINFO_EXTENSION);
    $fileSize=$_FILES['file']['size'];
    $size=$fileSize/1024;





 if($size<400){
    move_uploaded_file($fileLocation,"img/".$fileName);

 }else{
    echo "File size allow to maximum size 400kbyte";
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File uplode and move another location</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" >
        <input type="Submit" name="btnName" value="Uplode" >
    </form>
</body>
</html>