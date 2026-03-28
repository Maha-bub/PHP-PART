<?php

class car{
    public $Name="BMW";
    public $color="red";
    public $model="sd12";


    function indentity(){
        echo "Hi, I'm Mahabub Alam.";
    }

    //Change property value
    function change_color($color){
        $this->color=$color;
        return $this->color;

    } 

}

$class_object= new car();
echo $class_object->color;
echo "<br>";
echo $class_object->indentity();
echo "<br>";
echo $class_object->change_color("black")

?>