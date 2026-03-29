<?php
class Student
{
    public $name = "Mahabub";
    private $age = 25;
    protected $degree = "BSc in CSE";
    public $address = "Dhaka";  
    protected $salary = 50000;


    private function pInfo()
    {
        echo "This is a private function";
         echo " <br>";
    }

    public function pInfoDetails()
    {
        echo "This is priavate full method" . $this->pInfo();
         echo " <br>";
    }
    public function fullInfo()
    {
        echo $this->name;
        echo " <br>";
        echo $this->age;
        echo " <br>";
        echo $this->degree;
        echo " <br>";
        echo $this->address;
        echo " <br>";   
        echo $this ->salary;
         echo " <br>";
    }
}

class Child extends Student
{
    public function show()
    {
        echo "I am a running student in " . $this->degree;
    }
}
$result = new Student();
$result->fullInfo();
$chid=new Child();
$chid->pInfoDetails();
// $child = new child();

?>