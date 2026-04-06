<?php
// pattern/modifier/(case-sensitive or insensitive);
// preg_match
// preg_match_all()
// preg_replace

$str="Hi!, I'm Mahabub Alam as a trainee at IsDB BISEW IT  Scholourship Programm.";
$pattern="/i/i";

// prag match work to show the result count once.;
echo preg_match($pattern,$str);

// prag match all is work for show the modifire total count.
echo preg_match_all($pattern ,$str);
echo "<br>";

$descrp="Working as a Senior Software Engineer.";
$syntexPattern="/Senior/";
echo preg_replace($syntexPattern,"Junior",$descrp);





?>