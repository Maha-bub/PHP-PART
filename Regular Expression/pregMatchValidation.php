<?php
// preg match all
requrment:
$data="akashAlam214";
$pattern="/^[A-Za-z0-9]{3,13}$/";
echo preg_match_all($pattern,$data);



?>