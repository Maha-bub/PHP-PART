<?php
$students = [
    ["Rahim", 20, "Dhaka"],
    ["Karim", 22, "Khulna"],
    ["Salam", 19, "Chittagong"]
];


for ($i = 0; $i < count($students); $i++) {
    for ($j = 0; $j < count($students[$i]); $j++) {
        echo $students[$i][$j] . " ";
    }
    echo "<br>";
}

