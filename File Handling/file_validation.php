<?php
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

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>

<h2>All Uploaded Images:</h2>

<?php
$folder = "img/";
$files = scandir($folder);

foreach($files as $file){
    if($file != "." && $file != ".."){
        echo "<img src='".$folder.$file."' width='200px' height='200px' style='margin:10px;'>";
    }
}
?>