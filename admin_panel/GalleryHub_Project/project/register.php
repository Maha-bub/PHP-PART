<?php
session_start();
require 'config.php';

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = trim($_POST['full_name']);
    $email     = trim($_POST['email']);
    $password  = $_POST['password'];
    $re_pass   = $_POST['re_password'];
    $address   = trim($_POST['address']);
    $contact   = trim($_POST['contact']);
    $username  = trim($_POST['username']);

    // Validate email
    if (!preg_match('/^[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/', $email)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password: min 8 chars, 1 uppercase, 1 number, 1 special char
    if (!preg_match('/^(?=.*[A-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $errors[] = "Password must be at least 8 characters, include 1  letter, 1 number, and 1 special character.";
    }

    if ($password !== $re_pass) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($full_name) || empty($username) || empty($contact)) {
        $errors[] = "All fields are required.";
    }

    if (empty($errors)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, address, contact, username) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $full_name, $email, $hashed, $address, $contact, $username);
        if ($stmt->execute()) {
            $success = "Registration successful! You can now login.";
        } else {
            $errors[] = "Username or Email already exists.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register — GalleryHub</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

</head>
<body>
<div class="card">
  <div class="brand">Gallery<span>Hub</span></div>
  <p class="subtitle">Create your account</p>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-error">
      <?php foreach ($errors as $e): ?>
        <div>• <?= htmlspecialchars($e) ?></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php if ($success): ?>
    <div class="alert alert-success"><?= $success ?> <a href="login.php">Login →</a></div>
  <?php endif; ?>

  <form method="POST" autocomplete="off">
    <div class="field-row">
      <div class="field">
        <label>Full Name</label>
        <input type="text" name="full_name" placeholder="Full Name" value="<?= htmlspecialchars($_POST['full_name'] ?? '') ?>" required>
      </div>
      <div class="field">
        <label>Username</label>
        <input type="text" name="username" placeholder="Enter your Username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
      </div>
    </div>

    <div class="field">
      <label>Email Address</label>
      <input type="text" name="email" placeholder="Enter your email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
    </div>

    <div class="field-row">
      <div class="field">
        <label>Password</label>
        <input type="password" name="password" placeholder="Create a password" required>
        <div class="hint">Min 8 chars, 1 uppercase, 1 number, 1 symbol</div>
      </div>
      <div class="field">
        <label>Re-type Password</label>
        <input type="password" name="re_password" placeholder="Retype Password" required>
      </div>
    </div>

    <div class="field">
      <label>Address</label>
      <input type="text" name="address" placeholder="Enter your address" value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
    </div>

    <div class="field">
      <label>Contact Number</label>
      <input type="text" name="contact" placeholder="+880 1XXXXXXXXX" value="<?= htmlspecialchars($_POST['contact'] ?? '') ?>" required>
    </div>

    <button type="submit" class="btn">Create Account</button>
  </form>

  <div class="switch">
    Already have an account? <a href="login.php">Sign in →</a>
  </div>
</div>
</body>
</html>
