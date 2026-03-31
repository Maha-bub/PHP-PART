<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
</head>

<body>
    <?php
    interface identity
    {
        public function name();
        public function age();
        public function designation();
    }

    class Manager implements identity
    {
        public function name()
        {
            echo "Ms. Mahabub Alam <br>";
        }
        public function age()
        {
            echo "My age is 25 <br>";
        }
        public function designation()
        {
            echo "She is a Senior Manager <br>";
        }
    }



    $obj = new Manager();
    $obj->name();   
    $obj->age();
    $obj->designation();

    ?>
</body>

</html>