<?php
// $students = [
//     ["Rahim", 20, "Dhaka"],
//     ["Karim", 22, "Khulna"],
//     ["Salam", 19, "Chittagong"]
// ];


// for ($i = 0; $i < count($students); $i++) {
//     for ($j = 0; $j < count($students[$i]); $j++) {
//         echo $students[$i][$j] . " ";
//     }
//     echo "<br>";
// }

$char = [
    ["A", "E", "I", "O", "U"],
    ["Sumi", "Turu", "Parvin", "Meem", "Sadiya"],
    ["1", "2", "3", "3", "10"]
];
for ($i = 0; $i < count($char); $i++) {

    for ($j = 0; $j < count($char[$i]); $j++) {
        echo $char[$i][$j] . " ";
        echo "<br>";
    };
    echo " <br>";
}
