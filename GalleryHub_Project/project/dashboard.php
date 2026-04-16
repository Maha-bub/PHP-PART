<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$upload_error = "";
$upload_success = "";

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'upload') {
    $name = trim($_POST['name']);
    $custom_id = trim($_POST['custom_id']);

    if (empty($name) || empty($custom_id)) {
        $upload_error = "Name and ID are required.";
    } elseif (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
        $upload_error = "Please select an image file.";
    } else {
        $file = $_FILES['image'];
        $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file['type'], $allowed)) {
            $upload_error = "Only JPG, PNG, GIF, WEBP images are allowed.";
        } elseif ($file['size'] > 5 * 1024 * 1024) {
            $upload_error = "File size must be under 5MB.";
        } else {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = uniqid('img_') . '.' . $ext;
            $dest = $upload_dir . $filename;
            if (move_uploaded_file($file['tmp_name'], $dest)) {
                $stmt = $conn->prepare("INSERT INTO gallery (id, name, image) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE name=?, image=?");
                $stmt->bind_param("sssss", $custom_id, $name, $filename, $name, $filename);
                $stmt->execute();
                $upload_success = "Image uploaded successfully!";
            } else {
                $upload_error = "Upload failed. Check folder permissions.";
            }
        }
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $del_id = intval($_GET['delete']);
    $res = $conn->query("SELECT image FROM gallery WHERE id=$del_id");
    if ($row = $res->fetch_assoc()) {
        $img_path = 'uploads/' . $row['image'];
        if (file_exists($img_path)) unlink($img_path);
    }
    $conn->query("DELETE FROM gallery WHERE id=$del_id");
    header("Location: dashboard.php");
    exit;
}

// Fetch gallery
$gallery = $conn->query("SELECT * FROM gallery ORDER BY uploaded_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard — GalleryHub</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --ink: #1a1a2e;
    --accent: #e8734a;
    --accent2: #5b8dee;
    --surface: #ffffff;
    --muted: #f4f3ef;
    --border: #e2dfd8;
    --error: #d64045;
    --success: #2e7d52;
    --sidebar: #1a1a2e;
  }

  body {
    min-height: 100vh;
    background: var(--muted);
    font-family: 'DM Sans', sans-serif;
    color: var(--ink);
    display: flex;
  }

  /* SIDEBAR */
  .sidebar {
    width: 240px;
    min-height: 100vh;
    background: var(--sidebar);
    display: flex;
    flex-direction: column;
    padding: 32px 0;
    position: fixed;
    top: 0; left: 0;
    z-index: 100;
  }

  .sidebar-brand {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    color: #fff;
    padding: 0 28px 32px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
  }

  .sidebar-brand span { color: var(--accent); }

  .sidebar-nav { padding: 24px 0; flex: 1; }

  .nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 13px 28px;
    color: rgba(255,255,255,0.6);
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
  }

  .nav-item:hover, .nav-item.active {
    color: #fff;
    background: rgba(255,255,255,0.08);
    border-left: 3px solid var(--accent);
    padding-left: 25px;
  }

  .nav-icon { font-size: 1.1rem; }

  .sidebar-footer {
    padding: 20px 28px;
    border-top: 1px solid rgba(255,255,255,0.1);
  }

  .user-info {
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(255,255,255,0.8);
    font-size: 0.85rem;
    margin-bottom: 12px;
  }

  .avatar {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: var(--accent);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-weight: 600;
    font-size: 0.9rem;
    flex-shrink: 0;
  }

  .logout-btn {
    display: block;
    width: 100%;
    padding: 9px 16px;
    background: rgba(232,115,74,0.15);
    color: var(--accent);
    border: 1px solid rgba(232,115,74,0.3);
    border-radius: 8px;
    text-align: center;
    text-decoration: none;
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.2s;
  }

  .logout-btn:hover { background: var(--accent); color: #fff; }

  /* MAIN */
  .main {
    margin-left: 240px;
    flex: 1;
    padding: 40px 40px;
    min-height: 100vh;
  }

  .page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 36px;
  }

  .page-title {
    font-family: 'Playfair Display', serif;
    font-size: 1.9rem;
    color: var(--ink);
  }

  .page-title span { color: var(--accent); }

  /* UPLOAD CARD */
  .upload-card {
    background: #fff;
    border-radius: 20px;
    padding: 36px;
    box-shadow: 0 4px 24px rgba(26,26,46,0.07);
    margin-bottom: 36px;
    animation: fadeUp 0.5s ease both;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .card-title {
    font-size: 1rem;
    font-weight: 500;
    color: var(--ink);
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .card-title::before {
    content: '';
    display: inline-block;
    width: 4px; height: 18px;
    background: var(--accent);
    border-radius: 2px;
  }

  .form-grid { display: grid; grid-template-columns: 1fr 1fr 2fr auto; gap: 16px; align-items: end; }

  label {
    display: block;
    font-size: 0.75rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #888;
    margin-bottom: 6px;
  }

  input[type="text"], input[type="file"] {
    width: 100%;
    padding: 11px 14px;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    color: var(--ink);
    background: var(--muted);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  input[type="text"]:focus, input[type="file"]:focus {
    border-color: var(--accent2);
    box-shadow: 0 0 0 3px rgba(91,141,238,0.12);
    background: #fff;
  }

  .upload-zone {
    border: 2px dashed var(--border);
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    background: var(--muted);
    cursor: pointer;
    transition: border-color 0.2s;
    position: relative;
  }

  .upload-zone:hover { border-color: var(--accent2); }

  .upload-zone input[type="file"] {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%; height: 100%;
    padding: 0;
    border: none;
  }

  .upload-zone-text { font-size: 0.85rem; color: #aaa; pointer-events: none; }
  .upload-zone-text strong { display: block; font-size: 1.4rem; color: #ccc; margin-bottom: 4px; }

  .btn-upload {
    padding: 12px 28px;
    background: var(--accent);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    white-space: nowrap;
    transition: background 0.2s, transform 0.1s;
  }

  .btn-upload:hover { background: #d4603a; transform: translateY(-1px); }

  .alert {
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 0.88rem;
    margin-bottom: 20px;
  }
  .alert-error { background: #fdf0f0; border: 1px solid #f5c6c6; color: var(--error); }
  .alert-success { background: #edf7f1; border: 1px solid #a8d8be; color: var(--success); }

  /* TABLE */
  .table-card {
    background: #fff;
    border-radius: 20px;
    padding: 36px;
    box-shadow: 0 4px 24px rgba(26,26,46,0.07);
    animation: fadeUp 0.5s 0.1s ease both;
  }

  .table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
  }

  .count-badge {
    background: var(--muted);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 4px 12px;
    font-size: 0.8rem;
    color: #888;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead tr {
    border-bottom: 2px solid var(--border);
  }

  th {
    text-align: left;
    padding: 12px 16px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #aaa;
    font-weight: 500;
  }

  td {
    padding: 16px;
    vertical-align: middle;
    border-bottom: 1px solid var(--border);
    font-size: 0.9rem;
  }

  tr:last-child td { border-bottom: none; }

  tr:hover td { background: #fafaf8; }

  .img-thumb {
    width: 72px;
    height: 56px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  .id-badge {
    display: inline-block;
    background: var(--muted);
    border: 1px solid var(--border);
    border-radius: 6px;
    padding: 3px 10px;
    font-size: 0.82rem;
    font-weight: 500;
    color: #666;
    font-family: monospace;
  }

  .btn-delete {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    background: #fff;
    border: 1.5px solid #f5c6c6;
    color: var(--error);
    border-radius: 8px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.82rem;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s;
  }

  .btn-delete:hover {
    background: var(--error);
    color: #fff;
    border-color: var(--error);
  }

  .empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #bbb;
  }

  .empty-state .icon { font-size: 3rem; margin-bottom: 12px; }
  .empty-state p { font-size: 0.9rem; }

  @media (max-width: 768px) {
    .main { margin-left: 0; padding: 20px; }
    .sidebar { display: none; }
    .form-grid { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<!-- SIDEBAR -->
<nav class="sidebar">
  <div class="sidebar-brand">Gallery<span>Hub</span></div>
  <div class="sidebar-nav">
    <a class="nav-item active" href="dashboard.php">
      <span class="nav-icon">🖼️</span> Gallery
    </a>
    <a class="nav-item" href="register.php">
      <span class="nav-icon">👤</span> Register New
    </a>
  </div>
  <div class="sidebar-footer">
    <div class="user-info">
      <div class="avatar"><?= strtoupper(substr($_SESSION['full_name'], 0, 1)) ?></div>
      <div>
        <div style="font-weight:500"><?= htmlspecialchars($_SESSION['full_name']) ?></div>
        <div style="font-size:0.75rem;opacity:0.6">@<?= htmlspecialchars($_SESSION['username']) ?></div>
      </div>
    </div>
    <a href="logout.php" class="logout-btn">Sign Out →</a>
  </div>
</nav>

<!-- MAIN CONTENT -->
<main class="main">
  <div class="page-header">
    <h1 class="page-title">Admin <span>Panel</span></h1>
    <div style="font-size:0.85rem;color:#aaa;">Welcome back, <?= htmlspecialchars($_SESSION['full_name']) ?></div>
  </div>

  <!-- UPLOAD FORM -->
  <div class="upload-card">
    <div class="card-title">Upload New Image</div>

    <?php if ($upload_error): ?>
      <div class="alert alert-error">⚠ <?= htmlspecialchars($upload_error) ?></div>
    <?php endif; ?>
    <?php if ($upload_success): ?>
      <div class="alert alert-success">✓ <?= htmlspecialchars($upload_success) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="upload">
      <div class="form-grid">
        <div>
          <label>Name</label>
          <input type="text" name="name" placeholder="e.g. Hummingbird" required>
        </div>
        <div>
          <label>ID</label>
          <input type="text" name="custom_id" placeholder="e.g. O1" required>
        </div>
        <div>
          <label>Image File</label>
          <div class="upload-zone">
            <input type="file" name="image" accept="image/*" required>
            <div class="upload-zone-text">
              <strong>📁</strong>
              Click to browse or drag image here
            </div>
          </div>
        </div>
        <div>
          <label>&nbsp;</label>
          <button type="submit" class="btn-upload">Upload →</button>
        </div>
      </div>
    </form>
  </div>

  <!-- GALLERY TABLE -->
  <div class="table-card">
    <div class="table-header">
      <div class="card-title" style="margin-bottom:0">Gallery Records</div>
      <span class="count-badge"><?= $gallery->num_rows ?> items</span>
    </div>

    <?php if ($gallery->num_rows === 0): ?>
      <div class="empty-state">
        <div class="icon">🖼️</div>
        <p>No images uploaded yet. Add your first image above!</p>
      </div>
    <?php else: ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Uploaded</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $gallery->fetch_assoc()): ?>
          <tr>
            <td><span class="id-badge"><?= htmlspecialchars($row['id']) ?></span></td>
            <td><strong><?= htmlspecialchars($row['name']) ?></strong></td>
            <td>
              <img src="uploads/<?= htmlspecialchars($row['image']) ?>"
                   alt="<?= htmlspecialchars($row['name']) ?>"
                   class="img-thumb"
                   onerror="this.src='https://via.placeholder.com/72x56?text=No+Img'">
            </td>
            <td style="color:#aaa;font-size:0.82rem"><?= date('d M Y', strtotime($row['uploaded_at'])) ?></td>
            <td>
              <a href="dashboard.php?delete=<?= $row['id'] ?>"
                 class="btn-delete"
                 onclick="return confirm('Delete this record?')">
                🗑 Delete
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</main>

<script>
  // Show file name in upload zone
  document.querySelector('input[type="file"]').addEventListener('change', function() {
    const zone = this.closest('.upload-zone');
    const text = zone.querySelector('.upload-zone-text');
    if (this.files[0]) {
      text.innerHTML = '<strong>✅</strong>' + this.files[0].name;
    }
  });
</script>
</body>
</html>
