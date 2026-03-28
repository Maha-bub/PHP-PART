<?php
class Person {
    public $name;
    public $age;

    public function setName($n){
        $this->name=$n;
    }
    public function setAge($a){
        $this->age=$a;
    }
    public function getName(){
        return $this->name;
    }
    public function getAge(){
        return $this->age;
    }
}

$result=new Person();
$result->setName("Jakir");
echo "<br>";
echo $result->getName();
?>