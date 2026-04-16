<?php
if($_SERVER['REQUEST_METHOD']=="POST"){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $repass = $_POST['repass'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];

    // Regex validation
    if(!preg_match("/^[a-zA-Z ]+$/", $name)){
        die("Invalid name");
    }

    if(!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)){
        die("Invalid email");
    }

    if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/", $pass)){
        die("Password must be 6+ chars with number");
    }

    if($pass != $repass){
        die("Password not match");
    }

    $data = "$username,$pass\n";
    file_put_contents("users.txt", $data, FILE_APPEND);

    echo "Registered successfully";
}
?>

<link rel="stylesheet" href="style.css">
<div class="container">
<form method="post">
    <input name="id" placeholder="ID" required>
    <input name="name" placeholder="Full Name" required>
    <input name="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <input name="repass" type="password" placeholder="Re-type Password" required>
    <input name="address" placeholder="Address">
    <input name="contact" placeholder="Contact">
    <input name="username" placeholder="Username" required>
    <button>Register</button>
</form>
</div>