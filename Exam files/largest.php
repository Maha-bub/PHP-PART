<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $number1=$_POST['num1'];
    $number2=$_POST['num2'];
    $number3=$_POST['num3'];

    if($number1>$number2 &&$number1>$number3){
        echo "Ther largest Number is : .$number1";
    }
    else if( $number2>$number1 &&$number2>$number3){
        echo "Ther largest Number is : .$number2";
    }
    else {
        echo "Ther largest Number is : .$number3";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find the largest number among three numbers.</title>
    <link rel="stylesheet" href="largest.css">

</head>
<body>
    <form action="#" method="POST">
        <h1>Enter 3 Numbers:</h1>
        <input type="number" name="num1" placeholder="Number 1"> 
        <input type="number" name="num2" placeholder="Number 2"> 
        <input type="number" name="num3" placeholder="Number 3"> 
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>