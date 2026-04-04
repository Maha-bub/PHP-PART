<?php

class LastUser{
    public $name="Liyes";
    public $designation="Jr. Developer";


    public function userInfo(){
        echo "Hi, I'm ".$this->name." working as a ".$this->designation;
    }
}

$userMsg=new LastUser();
$userMsg->userInfo();


?>