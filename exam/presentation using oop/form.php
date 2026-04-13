<?php
include "class.php";

// Save Data
if ($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["btnsubmit"])) {
    $name= $_POST["name"];
    $id=$_POST["id"];
    $Course=$_POST["Course"];

    $s = new InfoAll($name, $id, $Course);
    $s->data_Store_Style();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Search Data
$searchResult = "";
if ($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["search"])) {
    $searchId = $_POST["search_id"];

    $s = new InfoAll("", "", "");
    ob_start(); // output capture
    $s->display($searchId);
    $searchResult = ob_get_clean();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Details of a person.</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f2f2f2;
            text-align: center;
        }

        form {
            background: white;
            padding: 20px;
            margin: 20px auto;
            width: 600px;
            border-radius: 10px;
        }

        input, button {
            width: 95%;
            padding: 8px;
            margin: 5px auto;

        }

        button {
             width: 100%;
            padding: 8px;
            margin: 5px auto;
            background: #d0ad2f;
            color: white;
            border: none;
            border-radius: 10px;
        }

        table {
            margin: auto;
            background: white;
            border-collapse: collapse;
            width: 70%;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>

<marquee behavior="focused" direction=""><h2>Student Information Form</h2></marquee>
<h2>Please Submit Your Information</h2>

<form method="post">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="text" name="id" placeholder="ID" required><br>
    <input type="text" name="Course" placeholder="Course" required><br>
    <button name="btnsubmit">Save</button>
</form>

<h2>Search Result</h2>
<?php echo $searchResult; ?>

<div class="form-box">
    <form method="post">

        <div class="form-row">
            <label>Enter ID:</label>
            <input type="text" name="search_id" required>
        </div>

        <button name="search">Search</button>

    </form>
</div>
<?php
$s = new InfoAll("", "", "");
$s->display();
?>


<table>
<tr>
    <th>Name</th>
    <th>ID</th>
    <th>Course</th>
</tr>

<?php
if (file_exists("database.txt")) {
    $rows = file("database.txt");

    foreach ($rows as $row) {
        $data = explode(",", trim($row));
        echo "<tr>
                <td>{$data[0]}</td>
                <td>{$data[1]}</td>
                <td>{$data[2]}</td>
              </tr>";
    }
}
?>

</table>

</body>
</html>