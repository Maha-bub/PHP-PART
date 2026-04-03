<?php
 abstract class Shape{
    abstract public function area();

 }

  class Circle extends Shape{
    private $radius=10;
    private $pi=3.1416;
    
    public function area(){
        $area=2*$this->pi * $this->radius * $this->radius;
        return $area;
    }
    }
    $result=new Circle();
    echo $result->area();


?>

