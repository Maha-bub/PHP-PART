<?php
if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    $email_pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";

    $pass_validation="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";


//     $data=$username.",".$password.",".$email."\n";
//     file_put_contents("info.txt",$data,FILE_APPEND);
//     $msg="Registration Succesfull";
//     header("location:login.php");
//     exit();
// }


if(!preg_match($email_pattern,$email)){
    echo"Your email is invalid!";
}elseif(!preg_match($pass_validation,$password)){
    echo"your password must be capital or 8 length";
}else{
    $file = fopen("info.txt","a");
    $data =$username."|".$password."|".$email.PHP_EOL;
    fwrite($file,$data);
    fclose($file);
    echo"Registration Sucessfully";
    header("location:login.php");
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
   <div class = "register-box">
    <h2>Registration</h2>

    <?php
    if(isset($msg)){
        echo"<div class ='msg'>$msg</div>";
    }
    ?>

    <form action="" method="post">
        
        username <br>
        <input type="text"name="username" required>
        <br> <br>
       
        password <br>
        <input type="text" name="password" required>
        <br> <br>

         email <br>
        <input type="text" name="email" required>
        <br> <br>
        <button name="register">Register</button>
    </form>
    <a href="login.php">Go to login</a>


   </div> 
</body>
</html>