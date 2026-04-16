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
    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $errors[] = "Password must be at least 8 characters, include 1 uppercase letter, 1 number, and 1 special character.";
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
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --ink: #1a1a2e;
    --accent: #e8734a;
    --accent2: #5b8dee;
    --surface: #ffffff;
    --muted: #f4f3ef;
    --border: #ddd9d0;
    --error: #d64045;
    --success: #2e7d52;
  }

  body {
    min-height: 100vh;
    background: var(--muted);
    font-family: 'DM Sans', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 16px;
    background-image: radial-gradient(circle at 20% 20%, #e8d5c4 0%, transparent 50%),
                      radial-gradient(circle at 80% 80%, #c4d5e8 0%, transparent 50%);
  }

  .card {
    background: var(--surface);
    width: 100%;
    max-width: 560px;
    border-radius: 24px;
    padding: 48px 44px;
    box-shadow: 0 24px 80px rgba(26,26,46,0.12);
    animation: fadeUp 0.6s ease both;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .brand {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    color: var(--ink);
    margin-bottom: 4px;
  }

  .brand span { color: var(--accent); }

  .subtitle {
    color: #888;
    font-size: 0.9rem;
    margin-bottom: 32px;
    font-weight: 300;
  }

  .field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

  .field { margin-bottom: 18px; }

  label {
    display: block;
    font-size: 0.78rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #666;
    margin-bottom: 6px;
  }

  input {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    font-size: 0.95rem;
    font-family: 'DM Sans', sans-serif;
    color: var(--ink);
    background: var(--muted);
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
  }

  input:focus {
    border-color: var(--accent2);
    box-shadow: 0 0 0 3px rgba(91,141,238,0.15);
    background: #fff;
  }

  .hint {
    font-size: 0.73rem;
    color: #aaa;
    margin-top: 4px;
  }

  .btn {
    width: 100%;
    padding: 14px;
    background: var(--accent);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    margin-top: 8px;
    transition: background 0.2s, transform 0.1s;
  }

  .btn:hover { background: #d4603a; transform: translateY(-1px); }
  .btn:active { transform: translateY(0); }

  .alert {
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 0.88rem;
    margin-bottom: 20px;
  }

  .alert-error { background: #fdf0f0; border: 1px solid #f5c6c6; color: var(--error); }
  .alert-success { background: #edf7f1; border: 1px solid #a8d8be; color: var(--success); }

  .switch {
    text-align: center;
    margin-top: 24px;
    font-size: 0.88rem;
    color: #888;
  }

  .switch a { color: var(--accent2); text-decoration: none; font-weight: 500; }
  .switch a:hover { text-decoration: underline; }

  .divider {
    height: 1px;
    background: var(--border);
    margin: 24px 0;
  }

  .section-label {
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: #bbb;
    text-align: center;
    margin: -34px auto 18px;
    background: #fff;
    display: inline-block;
    padding: 0 10px;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
  }
</style>
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
