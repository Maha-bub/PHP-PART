<?php
 require_once('userClass1.php');
 require_once('userClass2.php');
 require_once('userClass3.php');
 require_once('userClass4.php');

use UserOne\User;
use UserTwo\User as User2;
use UserThree\User as User3;
use UserFour\User as User4;

$userData=new User();
$userData->userInfo();
echo "<br>";

$userMsg=new User2();
$userMsg->userInfo();

echo "<br>";



$userMsg=new User3();
$userMsg->userInfo();
echo "<br>";


$userMsg=new User4();
$userMsg->userInfo();
?>