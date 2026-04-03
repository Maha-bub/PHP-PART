<?php
 class Car{
    public $name="marcedes";
    private $model="series20";
     
    public function  Info(){
        echo "This car is made by Marcedes and the model is invented Rahon";

    }

    public function Change_Name($Exchangename){
        $this->name = $Exchangename;
        return $this->name;
    }

        public function getchange_Model($ExchangeModel)
    { $this->model=$ExchangeModel;
        return $this->model;
    }
 }

 $carObject=new Car();
// //  echo $carObject->name;
// //  echo "<br>";
// // echo $carObject->name='BMW';
// // echo "<br>";

// echo $carObject->Change_Name("Toyota");
// // echo $carObject->name;



echo "<br>";
echo $carObject->model;
echo "<br>";
echo $carObject-> getchange_Model("series100Pro");
 
?>