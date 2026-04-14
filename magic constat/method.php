<!DOCTYPE html>
<html>
<body>

<h2>The __METHOD__ Constant</h2>
<p>This constant returns both class and function name:</p>

<?php
class Fruits {
  public function myValue(){
    return __METHOD__;
  }
}
$kiwi = new Fruits();
echo $kiwi->myValue();
?>
 
</body>
</html>
