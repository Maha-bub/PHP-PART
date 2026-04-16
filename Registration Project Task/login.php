<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = file("users.txt");

    foreach($users as $user){
        list($u,$p) = explode(",", trim($user));

        if($u == $username && $p == $password){
            $_SESSION['user'] = $username;
            header("Location: dashboard.php");
            exit;
        }
    }

    echo "Login failed";
}
?>

<link rel="stylesheet" href="style.css">
<div class="container">
<form method="post">
    <input name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button>Login</button>
</form>
</div>