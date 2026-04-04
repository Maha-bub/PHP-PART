<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form for submit data to Database</title>
</head>
<body>
    <form action="#" name="form">
        <label for="">Name:</label> <br>
        <input type="text" name="name" id="name" required><br><br>
        <label for="">Course:</label> <br>
        <input type="text" name="course" id="course" required><br><br>
        <label for="">University:</label> <br>
        <input type="text" name="university" id="university" required><br><br>  
        <input type="button" value="Button" onclick="submitData()">
    </form>
</body>
</html>