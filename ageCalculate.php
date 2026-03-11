<?php
$birthday= date_create("18-03-2003");
$currentday= date_create("10-01-2026");
echo "<br>";
$age=date_diff($birthday, $currentday);
echo "<br>";

echo $age->format("%d Days %m Months %y Years");




?>