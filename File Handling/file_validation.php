<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
    $fileName=$_FILES['file']['name'];
    $fileLocation=$_FILES['file']['tmp_name'];
    $fileType=pathinfo($fileName,PATHINFO_EXTENSION);

    if(!empty($fileName)){
        echo "Please select a file";
    }

    else if($fileType=="jpg"||$fileType=="png" || $fileType=="svg"){
        move_uploaded_file("$fileLocation","img/.$fileName");

    }else{
        echo "Only Jpg, png or svg file allow to uplode";
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