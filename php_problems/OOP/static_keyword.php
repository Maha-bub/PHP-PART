<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static Keyword</title>
</head>
<body>
    <?php
    Class User{
        public static $name="Hello Word!"."<br>";
        const name="Hello Word!"."<br>";

        public static function Info(){
            echo "This is static method <br>";
        }
    }
    
    
    ?>
</body>
</html>