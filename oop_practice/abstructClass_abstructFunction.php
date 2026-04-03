<?php
abstract class Vichels
{
    abstract public function VichelName();
}

class car extends Vichels
{
    public function VichelName()
    {
        echo "This is a new car:";
    }
}

class bike extends Vichels
{
    public function VichelName()
    {
        echo "This is a new bike:";
    }
}

$car = new car();
$car->VichelName();
$bike = new bike();
$bike->VichelName();
