

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super global variables</title>
</head>
<body>
    <!-- // super global variables
/*
local
global
static
superGlobal
*/  -->
    <h1>superGlobal Variable</h1>
<ul>
    <li>$_REQUEST</li>
    <li>$_GET</li>
    <li>$_POST</li>
</ul>

<?php
//  $store=$_REQUEST['name'];
//  echo "Name:".$store;
//  echo"<br>";
//  $store=$_GET['email'];
//  echo "Name:".$store;
//  echo"<br>";
 $store=$_POST['address'];
 echo "Name:".$store;
echo"<br>";

?>
<form action="" method="post">
    <!-- <label for="">Name:</label>
    <input type="text" name="name"> <br>

    <label for="">Email:</label>
    <input type="email" name="email"> <br> -->

    <label for="">Address:</label>
    <input type="text" name="address"><br>

    <input type="submit" value="Submit">
</form>
    
</body>
</html>