<?php
 class Car{
    public $name="marcedes";
    private $model="series20";
     
    public function  Info(){
        echo "This car is made by Marcedes and the model is invented Rahon";

    }

    public function Exchange($Exchangename){
        $this->name = $Exchangename;
        return $this->name;
    }
 

 }

 $carObject=new Car();
 echo $carObject->name;
?>