<?php
    namespace UserOne;

   class User{
    public $name="Mahabub";
    public $id=1235;
    public $designation="Jr. Developer";

    public function userInfo(){
        echo "Hi, This is ".$this->name." I'm working as a ".$this->designation." at New Horizonse Learning Center.";
    }
   }

  
?>