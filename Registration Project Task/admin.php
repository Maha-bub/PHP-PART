<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

// Upload
if($_SERVER['REQUEST_METHOD']=="POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];

    $imgName = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $path = "uploads/".$imgName;
    move_uploaded_file($tmp, $path);

    $data = "$id,$name,$imgName\n";
    file_put_contents("db.txt", $data, FILE_APPEND);
}
?>

<link rel="stylesheet" href="style.css">

<h2>Admin Panel</h2>

<form method="post" enctype="multipart/form-data">
    <input name="id" placeholder="ID" required>
    <input name="name" placeholder="Name" required>
    <input type="file" name="image" required>
    <button>Add</button>
</form>

<h3>Data Table</h3>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Image</th>
    <th>Action</th>
</tr>

<?php
$rows = file("db.txt");

foreach($rows as $index => $row){
    list($id,$name,$img) = explode(",", trim($row));
?>
<tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $name; ?></td>
    <td><img src="uploads/<?php echo $img; ?>"></td>
    <td>
        <a href="delete.php?index=<?php echo $index; ?>&img=<?php echo $img; ?>">
            Delete
        </a>
    </td>
</tr>
<?php } ?>
</table>

<a href="logout.php">Logout</a>