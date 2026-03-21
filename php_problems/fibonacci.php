<?php
$n = 10; // কতগুলো সংখ্যা চাই

$a = 0;
$b = 1;
$sum = 0;

echo "Fibonacci Series: ";

for ($i = 1; $i <= $n; $i++) {
    echo $a . " ";
    $sum += $a;

    $next = $a + $b;
    $a = $b;
    $b = $next;
}

echo "<br>Sum of Fibonacci Series: " . $sum;
?>