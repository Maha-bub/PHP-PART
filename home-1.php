<!DOCTYPE html>
<html>

<body>

    <?php

    // PHP Passing Arguments by Reference Function


    function addition(&$value)
    {
        $sum = 0;

        $sum += $value;
    }
    $number = 5;
    $result = addition($number);
    echo $number;

    ?>

</body>

</html>