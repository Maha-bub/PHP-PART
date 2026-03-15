
<?php
$serverName = "localhost";
$userName = "root";
$password = "";

// database connection
$conn = mysqli_connect($serverName, $userName, $password);

if (!$conn) {
    die("Sorry we are failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection was successful! <br>";
}

$sql = "CREATE DATABASE alam22";

if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
?>