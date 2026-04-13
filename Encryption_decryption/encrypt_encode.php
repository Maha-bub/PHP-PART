<?php
// $pass="1231231";

// // base64_encode use for encrypt data
// $encode=base64_encode($pass);
// echo $encode;

// echo "<br>";

// // base64_decode use for decrypt from encrypted data
// echo base64_decode('MTIzMTIzMQ==');



echo "<br>";echo "<br>";echo "<br>";
$PasswordData="alam";
$userKey="2a123";
$build_in_method="AES-128-CTR";
// // iv use for unique encryption value. if we don't use iv then every single encrypted value are same, so we use IV for extra security 


// iv (Initialization vector) means extra security layer
$iv_length = openssl_cipher_iv_length($build_in_method);
// random IV (Initialization vector)
$iv = openssl_random_pseudo_bytes($iv_length);


$encrypted=openssl_encrypt($PasswordData, $build_in_method, $userKey, 0,$iv);

echo $encrypted;
echo "<br>";
echo "<br>";
echo "<br>";

// decrypted 
$decypted=openssl_decrypt($encrypted, $build_in_method, $userKey, 0,$iv);
echo $decypted;

?>