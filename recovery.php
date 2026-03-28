<?php

/* Example: value only */
$array = [1, 2, 3, 17];

foreach ($array as $value) {
    echo "Current element of \$array: $value.\n";
}

/* Example: key and value */
$array = [
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
];

foreach ($array as $key => $value) {
    echo "Key: $key => Value: $value\n";
}


?>