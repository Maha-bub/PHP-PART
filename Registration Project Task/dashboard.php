<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['user']; ?></h2>

<a href="admin.php">Go to Admin Panel</a><br>
<a href="logout.php">Logout</a>