<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="">
        Enter a character:
        <input type="text" name="letter" maxlength="1">
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $letter = $_POST["letter"];

        if (!ctype_alpha($letter)) {
            echo "Please enter a valid alphabet";
        } elseif (in_array(strtolower($letter), ['a', 'e', 'i', 'o', 'u'])) {
            echo "Vowel";
        } else {
            echo "Consonant";
        }
    }
    ?>

</body>

</html>