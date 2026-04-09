    <?php
include "class.php";

// Data Get and check methods.
if ($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["btnsubmit"])) {
    $name= $_POST["name"];
    $id=$_POST["id"];
    $Course=$_POST["Course"];
    $s = new InfoAll($name, $id, $Course);
    $s->data_Store_Style();
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

<h2>Information Form</h2>

<form method="post">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="text" name="id" placeholder="ID" required><br>
    <input type="text" name="Course" placeholder="Course" required><br>
    <button name="btnsubmit">Save</button>
</form>

<table>
     <?php
if(isset($_POST["btnsubmit"])){
    echo "<tr>
    <th>Name</th>
    <th>ID</th>
    <th>Course</th>
</tr>";

$s = new InfoAll(" ", " ", " ");    
$s->display();
}

?>

</table>

</body>
</html>