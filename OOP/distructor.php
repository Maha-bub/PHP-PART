<?php
class car
{
    public $name;
    public $model;
    public function __destruct()
    {
        echo "Car object is being destroyed.";
    }
}

$c1 = new car();
$c1->name = "Toyota";
$c1->model = "Corolla";
echo "Car Name: " . $c1->name . "<br>";
echo "Car Model: " . $c1->model . "<br>";               
?>