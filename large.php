<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        $num1 = $_GET["num1"];
        $num2 = $_GET["num2"];

        if ($num1 > $num2) {
            echo "Largest Number is: " . $num1;
        } else {
            echo "Largest Number is: " . $num2;
        }
    }
    ?>
    <form method="GET" action="">
        Number 1: <input type="number" name="num1"><br><br>
        Number 2: <input type="number" name="num2"><br><br>

        <input type="submit" value="Find Largest">
    </form>
</body>

</html>