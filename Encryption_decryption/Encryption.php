<?php
$password="123123";
// echo md5($password);


// echo "<br>";
// echo sha1($password);
// echo "<br>";
// echo hash ('sha224',$password);
// echo "<br>";

$new= hash('sha3-512',$password);
// echo "<br>";
// echo hash('sha3-384',$password);
// echo "<br>";
// echo hash('sha512/224',"mahabub                                           0                                                                                                                                                                                                                                                                                                                                                                      ");
// echo "<br>";



 $encrypt=password_hash($password,PASSWORD_DEFAULT);
 echo $encrypt;
echo "<br>";
echo "<br>";
echo "<br>";
$password="123123";

// password_hash($encrypt, PASSWORD_DEFAULT);
 if(password_verify($password,$encrypt)){
    echo "valid";

 }
 else{
    echo "Invalid";
 }

?>