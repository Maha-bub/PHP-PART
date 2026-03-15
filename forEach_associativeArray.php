<?php
echo "Welcome to associates array and get values using forEach function";
$FavColor = array("Sobuj" => "green", "Rohan" => "red", "Ashik" => "Blue", "Mahabub" => "White", "Joy" => "SKyblue");
foreach ($FavColor as $person => $value) {
    echo "<br>Favorite color of $person is $value";
}
