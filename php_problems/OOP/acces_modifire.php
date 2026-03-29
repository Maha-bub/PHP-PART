<?php
class Student{
    private $name="Mahabub";
    protected $age=25;
    
    public function __construct() {
    }
    
    function names(){
        echo "My name is ".$this->name;

    }
}

$identity=new Student();

// name is private so we can't access it outside the class.
// echo $identity->name;

// now we can access name from the public function names.
$identity->names();
?>