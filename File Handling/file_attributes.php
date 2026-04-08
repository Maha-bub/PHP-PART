<?php
echo "File Name:".$_FILES['FileName']['name'];
echo "<br>";
echo "File Type:".$_FILES['FileName']['type'];
echo "<br>";
echo "File Temporary Name:". $_FILES['FileName']['tmp_name'];
echo "<br>";
echo "File Size:". $_FILES['FileName']['size'];
echo "<br>";
echo "File Error:".$_FILES['FileName']['error'];
echo "<br>";
echo "File location/File Full Path:". $_FILES['FileName']["full_path"];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uplode</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="FileName">
        <input type="submit">
        
    </form>
</body>
</html>