<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$uploadDir = __DIR__ . '/uploads/';
$logFile = __DIR__ . '/logs/uploads.log';
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $fileType = $_POST['type'] ?? 'unknown';
    $username = $_SESSION['username'];

    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $targetPath = $uploadDir . $fileName;

    if (!in_array($fileType, ['product', 'avatar'])) {
        $error = "Invalid file type selected.";
    } elseif (!in_array(mime_content_type($file['tmp_name']), ['image/jpeg', 'image/png', 'image/gif'])) {
        $error = "Only images are allowed.";
    } elseif (move_uploaded_file($file['tmp_name'], $targetPath)) {
        $mime = mime_content_type($targetPath);
        $size = filesize($targetPath);
        $time = date('Y-m-d H:i:s');
        $logLine = "[$time] - USER: $username - TYPE: $fileType - PATH: $targetPath - MIME: $mime" . PHP_EOL;
        file_put_contents($logFile, $logLine, FILE_APPEND);
        $success = "File uploaded successfully.";
    } else {
        $error = "Failed to upload file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container">
    <h3>Upload Image</h3>

    <?php if ($success): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php elseif ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Choose image:</label>
        <input type="file" name="file" class="form-control" accept="image/*" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Type:</label>
        <select name="type" class="form-select" required>
          <option value="">Select type</option>
          <option value="avatar">Avatar</option>
          <option value="product">Product</option>
        </select>
      </div>
      <button class="btn btn-primary">Upload</button>
    </form>
  </div>
</body>
</html>
