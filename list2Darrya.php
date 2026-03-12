<?php
$char = [
    ["A", "E", "I", "O", "U"],
    ["Sumi", "Turu", "Parvin", "Meem", "Sadiya"],
    ["1", "2", "3", "3", "10"]
];
for ($i = 0; $i < count($char); $i++) {
    echo "<p><b>catergory-$i<p></b>";
    // echo "<ul>";
    for ($j = 0; $j < count($char[$i]); $j++) {
        echo  $char[$i][$j] . " ";
        echo "<br>";
    };
    echo " <br>";
}
