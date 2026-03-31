<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num = $_POST['name'];

    if ($num <= 100 && $num >= 80) {
        echo "You have got A+";
    } elseif ($num <= 79 && $num >= 70) {
        echo "You have got A";
    } elseif ($num <= 79 && $num >= 60) {
        echo "You have got B+";
    } elseif ($num <= 59 && $num >= 50) {
        echo "You have got B";
    } elseif ($num <= 49 && $num >= 40) {
        echo "You have got C";
    } elseif ($num <= 39 && $num >= 33) {
        echo "You have got D";
    } else {
        echo "You failed!!";
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check grade</title>
</head>

<body>
    <form action="" method="post">
        Enter a Number: <br>
        <input type="number" name="name" id=""> <br> <br>
        <input type="submit" name="submit">
    </form>

</body>

</html>