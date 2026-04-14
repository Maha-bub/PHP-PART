<!DOCTYPE html>
<html>
<body>

<h2>The __CLASS__ Constant</h2>

<p>This constant returns the class name:</p>

<?php
class Fruits {
  public function myValue(){
    return __CLASS__;
  }
}
$kiwi = new Fruits();
echo $kiwi->myValue();
?>
 
</body>
</html>
