<?php
namespace myArea;

class Fruits {
  public function myValue(){
    return Fruits::class;
  }
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>The ClassName::class Constant</h2>
<p>This constant returns the class name and name of the namespace (if any):</p>

<?php
$kiwi = new Fruits();
echo $kiwi->myValue();
?>

</body>
</html>
