<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $userName  = trim($_POST['username']);
    $userEmail = trim($_POST['email']);
    $userPass  = trim($_POST['password']);

    $file = "database.txt";

    // Create file if not exists
    if(!file_exists($file)){
        fopen($file, "w");
    }

    $users = file($file, FILE_IGNORE_NEW_LINES);

    $exists = false;

    // Check if email already exists
    foreach($users as $user){
        list($storedUser, $storedEmail, $storedPass) = explode(",", $user);

        if($storedEmail == $userEmail){
            $exists = true;
            break;
        }
    }

    if($exists){
        $error = "Email already registered!";
    } else {
        // Save user
        $data = $userName . "," . $userEmail . "," . $userPass . PHP_EOL;
        file_put_contents($file, $data, FILE_APPEND);

        $_SESSION['username'] = $userName;

        // ✅ redirect only after success
        header("Location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration as a new user</title>
   <link rel="stylesheet" href="register.css">
</head>
<body>

<div class="login-container">
    <h2>Registration</h2>
    
    <?php
    if(isset($error)){
        echo "<div class='error'>$error</div>";
    }
    ?>

    <form method="post">
        <input type="text" name="username" placeholder="Enter Your Name" required>
        <input type="email" name="email" placeholder="Enter a email" required>
        <input type="password" name="password" placeholder="Create a password" required>
        <button type="submit">Register</button>
        <p style="text-align:center; margin-top:10px;">Already have an account   
        <a href="./login.php">Login</a>
        </p>
    </form>
</div>

</body>
</html>