<?php
$password="123123";
echo md5($password);


echo "<br>";
echo sha1($password);
echo "<br>";
echo hash ('sha224',$password);
echo "<br>";

echo hash('sha3-512',$password);
echo "<br>";
echo hash('sha3-384',$password);
echo "<br>";
echo hash('sha512/224',"mahabub                                           0                                                                                                                                                                                                                                                                                                                                                                      ");
echo "<br>";
 echo hash('sha512',$password);

?>