<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];
    $count = 0;

    if ($number <= 1) {
        $count = 1;
    }

    for ($i = 2; $i < $number; $i++) {
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
    <title>Check Prime Number</title>
</head>

<body>

    <form action="" method="post">
        Enter a number:<br>
        <input type="number" name="number"><br><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>