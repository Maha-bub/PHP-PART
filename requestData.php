<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data from input data</title>
</head>
<body>
    <?php 
    echo $_REQUEST['userName'];
    ?>

    <form action="#">
        <label for="">User Name:</label>
        <input type="text" name="userName"><br>
        <input type="Submit" name="Submit">
    </form>
</body>
</html>