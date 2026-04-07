<?php
// preg match all
requrment:
// $data="akashAlam214";
// $pattern="/^[A-Za-z0-9]{3,13}$/";
// echo preg_match_all($pattern,$data);


// for number validation example.
$data="01304681301";
$requirement="/^01[3-9][0-9]{8}$/";
echo preg_match_all($requirement,$data);



?>