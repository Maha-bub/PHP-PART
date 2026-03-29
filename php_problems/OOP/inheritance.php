<?php
 class Students
 {
    public $name;
    public $age;
    public $address;
    public $id;
    public $subject;
    public function StudentInfo($name){
        echo "My name is".$this->name;
    }
    public function __construct(){
        echo "Hello world";
    }
    public function __destruct(){
        echo "<br> Good bye";

    }
 }
 class Teacher extends Students{
    public $exerience;
    public function teacherInfo(){
        echo "I am a teacher";
    }
 }

 class Authority extends Teacher{
    public $designation='Principal';
    public function authorityMsg(){
        echo "I am the principal of this school";
    }
 }

 $students_info=new Students();
 echo "<br>";
 $students_info->address="dhaka";
 echo "<br>";
    echo $students_info->address;

$teacher_info=new Teacher();
echo "<br>";
$teacher_info->teacherInfo();
echo "<br>";




?>