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

    function change_car_model($model_name){
        $this->name=$model_name;
        return $this->name;
    }

}

$class_object= new car();
echo $class_object->color;
echo "</br>";
echo $class_object->Name;
echo "<br>";
echo $class_object->indentity();
echo "<br>";
echo $class_object->change_color("black");

echo "</br>";
echo $class_object->change_car_model("Marcedes");

?>