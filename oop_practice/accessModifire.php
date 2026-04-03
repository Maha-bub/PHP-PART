<?php
class Car {
    public $name = "Mercedes";
    private $model = "series20";
     
    public function Info() {
        echo "This car is made by Mercedes";
    }

    public function changeName($exchangeName) {
        $this->name = $exchangeName;
        return $this->name;
    }

    // Setter
    public function setModel($exchangeModel) {
        $this->model = $exchangeModel;
    }

    // Getter
    public function getModel() {
        return $this->model;
    }
}

$carObject = new Car();

echo $carObject->changeName("Toyota");
echo "<br>";

echo $carObject->getModel();
echo "<br>";

$carObject->setModel("series100Pro");
echo $carObject->getModel();
?>