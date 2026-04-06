<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stName = $_POST['StName'];
    $stID = $_POST['StID'];
    $subject = $_POST['Subject'];
    $contact = $_POST['Contact'];
    $data = "$stName,$stID,$subject,$contact\n";
    file_put_contents('Text.txt', $data, FILE_APPEND);
}
?>
<html>
<head><title>Student Form</title></head>
<body>
<h1>Student Data Form</h1>
<form method="post">
    StName: <input type="text" name="StName"><br>
    StID: <input type="text" name="StID"><br>
    Subject: <input type="text" name="Subject"><br>
    Contact number: <input type="text" name="Contact"><br>
    <input type="submit" value="Submit">
</form>

<?php
if (file_exists('Text.txt')) {
    echo "<h2>Stored Data:</h2><pre>" . file_get_contents('Text.txt') . "</pre>";
}
?>
</body>
</html>