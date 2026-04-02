<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = intval($_POST['number']);
    
    if ($number <= 0) {
        $error = "Please enter a positive number.";
    } else {
        $fibonacci = [];
        $a = 0;
        $b = 1;
        
        for ($i = 0; $i < $number; $i++) {
            $fibonacci[] = $a;
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fibonacci Series</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        form {
            margin-bottom: 20px;
        }
        input {
            padding: 5px;
            margin-right: 10px;
        }
        button {
            padding: 5px 15px;
            cursor: pointer;
        }
        .result {
            background-color: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Fibonacci Series Generator</h1>
    
    <form method="POST">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" required>
        <br>
        <button type="submit">Generate</button> 
    </form>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($error)) {
            echo "<div class='error'>" . $error . "</div>";
        } else {
            echo "<div class='result'>";
            echo "<h2>Fibonacci Series (first " . $number . " numbers):</h2>";
            echo implode(", ", $fibonacci);
            echo "</div>";
        }
    }
    ?>
</body>
</html>
