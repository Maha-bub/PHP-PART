<?php
// pattern/modifier/(case-sensitive or insensitive);
//preg_match
//preg_match_all()
//preg_replace

$str="Hi!, I'm Mahabub Alam as a trainee at IsDB BISEW IT  Scholourship Programm.";
$pattern="/i/i";

echo preg_match_all($pattern ,$str);





?>