<?php
echo date("F j, Y, g:i a") . "\n";                 // March 10, 2001, 5:16 pm
echo "<br>";
echo date("m.d.y") . "\n";                         // 03.10.01
echo "<br>";
echo date("j, n, Y") . "\n";                       // 10, 3, 2001
echo "<br>";
echo date("Ymd") . "\n";  // 20010310
echo "<br>";
echo date('h-i-s, j-m-y, it is w Day') . "\n";     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
echo "<br>";
echo date('\i\t \i\s \t\h\e jS \d\a\y.') . "\n";   // it is the 10th day.
echo "<br>";
echo date("D M j G:i:s T Y") . "\n";               // Sat Mar 10 17:16:18 MST 2001
echo "<br>";
echo date('H:m:s \m \i\s\ \m\o\n\t\h') . "\n";     // 17:03:18 m is month
echo "<br>";
echo date("H:i:s") . "\n";                         // 17:16:18
echo "<br>";
echo date("Y-m-d H:i:s") . "\n";                   // 2001-03-10 17:16:18 (the MyS
echo "<br>";
echo date_default_timezone_get() . date("h");
echo "<br>";

$age = (new DateTime('2002-05-15'))->diff(new DateTime())->y;
echo $age;
echo "<br>";
echo "<br>";
echo "<br>";
