<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $userName = trim($_POST['username']);
    $userPass = trim($_POST['password']);

    $file = "database.txt";

    if(!file_exists($file)){
        $error = "No users found!";
    } else {

        $users = file($file, FILE_IGNORE_NEW_LINES);
        $loginSuccess = false;

        foreach($users as $user){
            list($storedUser, $storedEmail, $storedPass) = explode(",", $user);

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
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    
    <?php
    if(isset($error)){
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="post">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
        <p style="text-align:center; margin-top:10px;">
         Don't have an account? 
        <a href="./registration.php">Register Now</a>
        </p>
    </form>
</div>

</body>
</html>