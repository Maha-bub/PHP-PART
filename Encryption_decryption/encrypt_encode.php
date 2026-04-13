<?php
$pass="1231231";

// base64_encode use for encrypt data
$encode=base64_encode($pass);
echo $encode;

echo "<br>";

// base64_decode use for decrypt from encrypted data
echo base64_decode('MTIzMTIzMQ==');

?>