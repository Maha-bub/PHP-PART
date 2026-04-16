<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location: login.php");
}

// session থেকে data নাও
$name  = $_SESSION['username'];
$email = $_SESSION['email'];

$folder = "img/";
$dataFile = "data.txt";

// Upload
if($_SERVER['REQUEST_METHOD']==='POST'){

    $fileName = $_FILES['file']['name'];
    $fileLocation = $_FILES['file']['tmp_name'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if(empty($fileName)){
        echo "Please select a file";
    }
    else if($fileType=="jpg"||$fileType=="png" || $fileType=="svg"){

        if(move_uploaded_file($fileLocation,$folder.$fileName)){
            
            // 🔥 Save Name + Email + Image
            $data = "$name,$email,$fileName\n";
            file_put_contents($dataFile, $data, FILE_APPEND);

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
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <input type="submit" value="Upload">
</form>

<a class="logout-btn" href="logout.php">Logout</a>

<h2 style="text-align:center;">All Uploaded Data</h2>

<table class="table">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Image</th>
    <th>Delete</th>
</tr>

<?php
if(file_exists("data.txt")){
    $rows = file("data.txt");

    foreach($rows as $index => $row){
        list($n,$e,$img) = explode(",", trim($row));
?>
<tr>
    <td><?php echo $n; ?></td>
    <td><?php echo $e; ?></td>
    <td>
        <img src="img/<?php echo $img; ?>">
    </td>
    <td>
        <a class="delete-btn" href="delete.php?index=<?php echo $index; ?>&img=<?php echo $img; ?>">
            Delete
        </a>
    </td>
</tr>
<?php
    }
}
?>
</table>

</body>
</html>