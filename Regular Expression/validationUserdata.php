<?php
//  mail validation example;
$userMail="mahabubulalam0511@gmail.c321om";
$pettern="/^[a-zA-Z0-9.-_+%]+@gmail\.[a-zA-Z0-9]{2,}$/";
if(preg_match_all($pettern,$userMail)){
    echo "valid mail";
}
else{
    echo "invalid mail";
}

// if($_SERVER[$_REQUEST])


// $userMail="mahabubulalam0511@gmail.com";
// $pettern="/^[a-zA-Z0-9.-+%-]+@[A-Za-z0-9]+\.[a-zA-Z]{2,}$/";
// echo preg_match_all($pettern,$userMail);


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Form</title>
</head>
<body>
    <form action="#" method="post">
        <label for="">Name:</label><br>
        <input type="text" name="Name" id="name"><br><br>
        <label for="">Email</label> <br>
        <input type="text" name="email"> <br><br>
        <button name="btnclicked" value="Submit">Submit</button>
    
    </form>
</body>
</html> -->