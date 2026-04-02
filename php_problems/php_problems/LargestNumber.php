<?php
$largest = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : null;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : null;
    $num3 = isset($_POST['num3']) ? (float)$_POST['num3'] : null;
    
    // if ($num1 !== null && $num2 !== null && $num3 !== null) {
    //     $largest = max($num1, $num2, $num3);
    // }

    $tempLargest = $num1;
    if($tempLargest<$num2){
        $tempLargest=$num2;
        echo "Largest number is :".$tempLargest . "<br>";
    } else if($tempLargest<$num3){
    $tempLargest=$num3;
    echo "Largest number is :".$tempLargest . "<br>";       
}else{
    echo "Largest number is :".$tempLargest . "<br>";

    
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Largest Number</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f5e9;
            border-left: 4px solid #4CAF50;
            border-radius: 4px;
        }
        .result p {
            margin: 0;
            color: #2e7d32;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Find the Largest Number</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="num1">Enter First Number:</label>
                <input type="number" id="num1" name="num1" step="any" required>
            </div>
            
            <div class="form-group">
                <label for="num2">Enter Second Number:</label>
                <input type="number" id="num2" name="num2" step="any" required>
            </div>
            
            <div class="form-group">
                <label for="num3">Enter Third Number:</label>
                <input type="number" id="num3" name="num3" step="any" required>
            </div>
            
            <button type="submit">Find Largest</button>
        </form>
        
        <?php if ($largest !== null): ?>
            <div class="result">
                <p>The largest number is: <strong><?php echo $largest; ?></strong></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
