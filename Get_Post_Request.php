<?php
// if(isset($_POST["userName"]) && $_POST["Pass"] == "")

//  
//  echo $name;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = $_REQUEST['userName'];

    if (empty($name)) {
        echo 'Username Must not be empty';
    } else{
        echo "You have submitted Username" . " " . $name;
    }
}
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $pass = $_REQUEST['Pass'];
        if (empty($pass)) {
            echo 'Password Must not be empty';
        } else {
            echo "You have submitted your Passward" . " " . $pass;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>

<body>
    <div class="conteiner">
        <form action="Get_Post_Request.php" method="get">
            User Name: <br>
            <input type="text" name="userName" id=""> <br><br>
            Passward: <br>
            <input type="passward" name="Pass"> <br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>