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
    </form>
</div>

</body>
</html>