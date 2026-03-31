<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final keyword</title>
</head>
<body>
    <?php
    final class Animal {
    public function sound() {
        echo "Animal sound";
    }
}

// Error: Cannot extend final class Animal  
class Dog extends Animal {
}
?>


</body>
</html>