<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Login </title>
</head>
<body>
    <form action="#" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button  type="submit" name="btnSubmit">Login</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST['btnSubmit'])){
    $userName=$_POST["username"];
    $userPass=$_POST["password"];

if($userName=='admin' && $userPass=='123'){
        echo "Login succes!";
        header('location:main.php');
}
else{
    echo "Username or password invalid!";
}
}

?>