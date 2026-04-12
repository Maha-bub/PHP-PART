<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];
    $count = 0;

    if ($number <= 1) {
        $count = 1;
    }

    for ($i = 2; $i < $number/2; $i++) {
        if ($number % $i == 0) {
            $count = 1;
            break;
        }
    }    
    if ($count == 0) {
        echo "This is a prime number.";
    } else {
        echo "This is not a prime number.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find the largest number among three numbers.</title>
    <link rel="stylesheet" href="largest.css">

</head>
<body>
    <form action="#" method="POST">
        <h1>Enter A Number:</h1>
        <input type="number" name="number" placeholder="Number"> 
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
