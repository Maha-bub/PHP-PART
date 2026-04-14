<?php
namespace myArea;
function myValue(){
  return __NAMESPACE__;
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>The __NAMESPACE__ Constant</h2>
<p>This constant returns the name of the namespace:</p>

<?php
echo myValue();
?>

</body>
</html>