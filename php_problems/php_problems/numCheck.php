<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number checkdate</title>
</head>

<body>
    <?php
    if (isset($_GET['submit'])) {
        $num = $_GET['name'];
        if ($num > 0) {
            echo "Positive Number";
        } elseif ($num < 0) {
            echo "Negative Number";
        } else {
            echo "Number is Zero.";
        }
    }
    ?>
    <form action="" method="get">
        Enter a number: <br>
        <input type="number" name="name" id=""> <br>
        <input type="submit" value="Submit" name="submit" value="Check">
    </form>

</body>

</html>