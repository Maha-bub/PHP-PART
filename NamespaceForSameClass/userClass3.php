
<?php

class ThirdUser{
    public $name="Tanjil Hossain";
    public $designation="Sr. Developer";


    public function userInfo(){
        echo "Hi, I'm ".$this->name." working as a ".$this->designation;
    }
}

$userMsg=new ThirdUser();
$userMsg->userInfo();


?>