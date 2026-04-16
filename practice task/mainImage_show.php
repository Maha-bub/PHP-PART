<?php
session_start();


 if(!isset($_SESSION['username'])){
	 header("location: login.php");
  }

if($_SERVER['REQUEST_METHOD']==='POST'){
    $fileName=$_FILES['file']['name'];
    $fileLocation=$_FILES['file']['tmp_name'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $folder="img/";

    if(empty($fileName)){
        echo "Please select a file";
    }
    else if($fileType=="jpg"||$fileType=="png" || $fileType=="svg"){
        
        if(move_uploaded_file($fileLocation,$folder.$fileName)){
            
            echo "File uploaded successfully";
        }else{
            echo "Upload failed!";
        }

    }else{
        echo "Only jpg, png or svg allowed";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="btnsumbit" value="Upload">
</form>

<a class="logout-btn" href="logout.php">Logout</a>

<h2>All Uploaded Images:</h2>
</body>
</html>


<?php
$folder = "img/";
$files = scandir($folder);
if(isset($_POST)==['btnsumbit']){
    foreach($files as $file){
    if($file != "." && $file != ".."){
        echo "<img src='".$folder.$file."' width='200px' height='200px' style='margin:10px;'>";
    }
}

}


?>