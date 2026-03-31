<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static concept</title>
</head>

<body>

    <?php
    class A
    {
        public function show()
        {
            echo ("Hi, I'm Mahabub Alam");
        }
    }

    class Name extends A
    {
        public static $name = "Mahabub";
        public static function nam()
        {
            echo "This is a static constructor in PHP.";
            echo self::$name;
        }
    }

    Name::nam();





    ?>
</body>

</html>