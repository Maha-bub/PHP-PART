<?php
session_start();
unset($_SESSION['userName']);

session_unset();
session_destroy();

header("Location: login.php");
exit();
?>