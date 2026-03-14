<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];
    $count = 0;
    if ($number <= 1) {
        $count = 1;
    }
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $count++;
            break;
        }
    }
    if ($count == 0) {
        echo "This is prime number.";
    } else {
        echo "This is not a prime.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check the number is prime or not </title>
</head>

<body>
    <form action="" method="post">
        Enter a number: <br>
        <input type="number" name="number"><br><br>
        <input type="submit" value="Submit" name="Submit">
    </form>
</body>

</html>