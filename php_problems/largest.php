<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $number3 = $_POST['number3'];
    if ($number1 > $number2 && $number1 > $number3) {
        echo "$number1 is largest.";
    } elseif ($number2 > $number1 && $number2 > $number3) {
        echo "$number2 is largest.";
    } else {
        echo "$number3 is largest.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Largest number check</title>
</head>

<body>
    <form action="" method="post">
        Enter 3 number: <br><br>
        <input type="number" name="number1" id="number"> <br> <br>
        <input type="number" name="number2" id="number"><br> <br>
        <input type="number" name="number3" id="number"><br> <br>
        <input type="submit" name="submit" id="">
    </form>
</body>

</html>