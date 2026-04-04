<?php

class User_Input {
    public $id;
    public $name;
    public static $fileName = "store.txt";

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function child() {
        return $this->id . "," . $this->name . "\n";
    }

    public function saveToFile() {
        file_put_contents(self::$fileName, $this->child(), FILE_APPEND);
    }
}

if (isset($_POST['submit'])) {
    $userInputId = $_POST['id'];
    $userInputName = $_POST['name'];

    $userInput = new User_Input($userInputId, $userInputName);
    $userInput->saveToFile();
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

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
