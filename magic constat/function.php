<!DOCTYPE html>
<html>
<body>

<h2>The __FUNCTION__ Constant</h2>
<p>This constant returns the function name:</p>

<?php
function myMessage(){
  return __FUNCTION__;
}
echo myMessage();
?>
 
</body>
</html>