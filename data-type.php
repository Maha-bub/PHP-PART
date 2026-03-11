<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <?php
    // Scaler(stirng,boolean,integer,float)
    // Compound datatype(array, function, object)

    // string
    $data = "Hello";
    echo $data;
    echo "<br>";
    var_dump($data);


    //boolean
    $vtype= true;
    echo "<br>";
    var_dump($vtype);


    //interger
    $int = 33;
    echo "<br>";
    var_dump($int);


    //float
     $f= 1.33;
    echo "<br>";
    var_dump($f);





    //compoundpart
    //array part
     $ary = array("a", "b", "c",10);
     var_dump($ary);
    echo "<br>";
    print_r($ary);

    //object
    //example
    class student1
    {
        public $same = "lucky";
    }
    $obj2 = new student1();
    echo $obj2;

    ?>
</body>
</html>