<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find largest number .</title>
</head>
<body>
    <form action="#" method="post" name="form">

        <label for="">Enter first number:</label>
        <input type="number" name="num1">
        <br><br>

        <label for="">Enter second number:</label>
        <input type="number" name="num2">
        <br><br>

        <label for="">Enter third number:</label>
        <input type="number" name="num3">
        <br><br>

        <input  type="submit" name="submit" value="Submit">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $num3 = $_POST['num3'];

        if ($num1 >= $num2 && $num1 >= $num3) {
            echo "The largest number is: " . $num1;
        } elseif ($num2 >= $num1 && $num2 >= $num3) {
            echo "The largest number is: " . $num2;
        } else {
            echo "The largest number is: " . $num3;
        }
    }

    
    ?>
</body>
</html>