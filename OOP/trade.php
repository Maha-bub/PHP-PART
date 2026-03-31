<?php
trait Main{
    public function Greatings(){
        echo "Welcome to explore the trait for alternative of multiple inheritance in php";
        echo " <br>";
    }
}
    class ExtendClass{
        use Main;
        public function seave(){
            echo "this is a child class of trait Function.";
             echo " <br>";
        }
    }
    $extendMsg= new ExtendClass();

    $extendMsg->Greatings();

?>