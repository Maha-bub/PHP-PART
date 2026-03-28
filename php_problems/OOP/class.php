<?php

class car{
    public $Name="BMW";
    public $color="red";
    public $model="sd12";


    function indentity(){
        echo "Hi, I'm Mahabub Alam.";
    }

}

$class_object= new car();
echo $class_object->color;
echo "<br>";
echo $class_object->indentity();
?>