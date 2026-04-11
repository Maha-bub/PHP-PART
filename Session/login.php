<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $userName = $_POST['username'];
    $userPass = $_POST['password'];

    $file = "store.txt";
    $users = file($file);

    $loginSuccess = false;

    foreach($users as $user){
        $user = trim($user);
        list($storedUser, $storedPass) = explode(",", $user);

        if($storedUser == $userName && $storedPass == $userPass){
            $loginSuccess = true;
            break;
        }
    }

    if($loginSuccess){
        $_SESSION['username'] = $userName;
        header("Location: main.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Form</h2>

<form method="post">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

<?php
if(isset($error)){
    echo "<p style='color:red;'>$error</p>";
}
?>

</body>
</html>