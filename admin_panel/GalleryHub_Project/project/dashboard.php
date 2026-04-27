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

</head>
<body>



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
