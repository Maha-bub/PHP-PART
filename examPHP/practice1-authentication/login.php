<?php
session_start();
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $data=file("info.txt");
    foreach($data as $line){
        list($username,$password)=explode("|",$line);
         if(trim($username) == ($username) && trim($password) == ($password)){
            $_SESSION['username']=$username;
            header("location:upload.php");
         }
         else{
            echo "user name & password incorrect";
         }

    // $user=explode(",", $line);

    // if(trim($user[0]) == ($username) && trim($user[1]) == ($password)){
    //     $_SESSION['user']=$username;
    //     header("location:upload.php");
    //     exit();
    // }
       
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div class="login-box">

   <h2>login</h2>

   <?php
   if(isset($error)){
    echo "<div class='error'>$error</div>";
   }
   ?>
<form action="" method="post">
    username <br>
    <input type="text" name="username" required> <br> <br>
    password <br>
    <input type="text" name="password" required> <br> <br>
    <button name="login">Login</button>

</form>
<br>
<a href="registration.php">Register</a>
   </div> 
</body>
</html>