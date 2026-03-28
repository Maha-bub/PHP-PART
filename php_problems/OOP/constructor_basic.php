<?php
class Student
{
    public $name;
    public $age;

    public function __construct($n, $a)
    {
        $this->name = $n;
        $this->age = $a;
    }

    public function info()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age;
    }
}

$s1 = new Student("Mahabub", 22);
$s1->info();
