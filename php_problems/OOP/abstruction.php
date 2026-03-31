<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstruction</title>
</head>

<body>
    <?php
    abstract class SoundEffect
    {
        abstract public function sound();
    }

    class NatureSound extends SoundEffect
    {
        public function sound()
        {
            echo "Nature sounds like strom, rain , wind and thunder  <br>";
        }
    }

    class Cat extends SoundEffect
    {
        public function sound()
        {
            echo "Cat meows";
        }
    }

    $obj = new NatureSound();
    $obj->sound();
    $cat = new Cat();
    $cat->sound();
    ?>
</body>

</html>