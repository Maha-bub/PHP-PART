<?php

class SecondUser{
    public $name="Hasibul Polok";
    public $designation="Sr. Developer";


    public function userInfo(){
        echo "Hi, I'm ".$this->name." working as a ".$this->designation;
    }
}

$userMsg=new SecondUser();
$userMsg->userInfo();

?>