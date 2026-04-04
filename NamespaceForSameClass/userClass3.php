<?php
namespace UserThree;

class User{
    public $name="Tanjil Hossain";
    public $designation="Sr. Developer";


    public function userInfo(){
        echo "Hi, I'm ".$this->name." working as a ".$this->designation;
    }
}




?>