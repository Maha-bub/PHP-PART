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

        if (
            $letter == 'a' || $letter == 'e' || $letter == 'i' || $letter == 'o' || $letter == 'u' ||
            $letter == 'A' || $letter == 'E' || $letter == 'I' || $letter == 'O' || $letter == 'U'
        ) {
            echo "It is a Vowel";
        } else {
            echo "It is a Consonant";
        }
    }
    ?>
</body>

</html>