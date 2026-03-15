<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My info</title>
</head>

<body>
    <?php
    // ways to connect to a MySQL Database
    // MySQLI extensino
    // PDO
    // Connecting to the Database

    $servername = "localhost";  
    $user="root";
    $password="";
     
    
    // Create a connection
    $connection= mysqli_connect($servername,$user,$password);
    echo "Connection was successful."
    
    ?>
    
</body>

</html>