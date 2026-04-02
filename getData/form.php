<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form থেকে data গুলি নেয়া
    $id = $_POST['id'];
    $name = $_POST['name'];

    // data তৈরি করা
    $data = "ID: " . $id . " | Name: " . $name . "\n";

    // 'store.txt' ফাইলে data write করা
    file_put_contents('store.txt', $data, FILE_APPEND);  // FILE_APPEND মানে পুরানো data কে overwrite না করে নতুন data যোগ করবে
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
    <form method="POST" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>