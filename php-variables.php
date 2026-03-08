 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php variables   </title>
 </head>
 <body>
    <?php
    // declaire global variable outsite from function;
    $num=50;
    $num2=60;
    function multiplication(){
        global $num;
        global $num2;
        $multiply=$num*$num2;
        echo $multiply;
    }
    multiplication();
    echo("<br>");

    function addition(){
        // num1 is declaired as local variable
        $num1 =6;
        global $num;
        $num++;
        $summation =$num1+$num;

        echo $summation;
    }
    addition();
    echo("<br>");
    addition();
    echo("<br>");
    addition();


    // static variable



    ?>
 </body>
 </html>