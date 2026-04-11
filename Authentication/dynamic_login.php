
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $userName=$_POST['username'];
    $userPass=$_POST['password'];

    $loginSuccess=false;
    $data="store.txt";
    $UserInfo=file($data);

    // foreach($UserInfo as $info){
    //     list($user,$pass)=explode(",",$info);

    //     if($user==$userName && $pass==$userPass){
    //         $loginSuccess=true;
    //     }
    //     }

    foreach($UserInfo as $info){
        // $info = trim($info); //trim use for white space deletion.
        list($user, $pass) = explode(",", $info);

        if($user == $userName && $pass == $userPass){
            $loginSuccess = true;
            break;
        }
    }
    if($loginSuccess==true){
        echo "Login Success!";
        header("Location: main.php");
             }
    else{
        echo "Invalid Password or User Name!";
    }
}
?>
