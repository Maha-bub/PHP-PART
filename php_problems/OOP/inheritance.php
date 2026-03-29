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
    public fu function __construct(){
        echo "Hello world";
    }
    public function __destruct(){
        echo "<br> Good bye";

    }
 }
 class teacher extends Students{
    public $exerience;
    public fu nction teacherInfo(){
        echo "I am a teacher";
    }
 }

 $all_info=new Students();
 $all_info->address="dhaka";
    echo $all_info->address;


?>