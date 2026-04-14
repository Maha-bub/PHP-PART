<!DOCTYPE html>
<html>
<body>

<h2>The __TRAIT__ Constant</h2>
<p>This constant returns the trait name:</p>

<?php
trait message1 {
  public function msg1() {
    echo __TRAIT__; 
  }
}

class Welcome {
  use message1;
}

$obj = new Welcome();
$obj->msg1();
?>
 
</body>
</html>
