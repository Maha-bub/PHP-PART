<?php
class Student
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function info()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age;
    }
}
$s1 = new Student("Mahabub", 22);
$s1->info();
