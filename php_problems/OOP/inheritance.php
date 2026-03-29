<?php
 class Students
 {
    public $name;
    public $age;
    public $address;
    public $id;
    public $subject;
    public function StudentInfo(){
        
        echo "hello Student";
    }
 }

 $all_info=new Students();
 $all_info->address="dhaka";
    echo $all_info->address;

?>