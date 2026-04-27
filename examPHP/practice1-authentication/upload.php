<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['upload'])){

    $file = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];

    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if(($ext == "jpg" || $ext == "png") && $size <= 3*1024*1024){

        move_uploaded_file($temp, "upload/" . $file);
        $msg = "File uploaded successfully";

    }else{
        $error = "Only jpg and png allowed and max size 3MB";
    }
}
?>

<body>
<h2>Welcome <?php echo $_SESSION['username'];?></h2>
<a href="logout.php">logout</a>
<?php
if(isset($msg)) echo "<p style='color:green;'>$msg</p>";
if(isset($error)) echo "<p style='color:red;'>$error</p>";
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <br><br>
    <button type="submit" name="upload">Upload</button>
</form>
<h2 style="color:black;text-align:center;"> image Gallery</h2>
<?php
if(isset($msg)){
    echo "<p style='color:green;'>$msg</p>";
    echo "<img src='upload/".$file."' width='250'>";
}

if(isset($error)){
    echo "<p style='color:red;'>$error</p>";
}
?>

</body>