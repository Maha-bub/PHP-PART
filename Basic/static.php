<?php
function counter() {
    static $count = 0;
    $count++;
    echo $count;
}

counter();
echo("<br>");
counter();S
echo("<br>");
counter();
?>