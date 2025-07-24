<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$uploadDir = __DIR__ . '/uploads/';
$logFile = __DIR__ . '/logs/uploads.log';

$images = glob($uploadDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
$logs = file_exists($logFile) ? file($logFile) : [];

$imageInfo = [];

foreach ($logs as $line) {
    if (preg_match('/PATH:\s*(.+?)\s*-\s*MIME:.*TYPE:\s*(\w+)/', $line, $matches)) {
        $path = trim(str_replace('PATH: ', '', $matches[1]));
        $type = trim($matches[2]);
        $file = basename($path);
        $imageInfo[$file] = $type;
    }
}

if (isset($_GET['delete'])) {
    $file = basename($_GET['delete']);
    $fullPath = $uploadDir . $file;
    if (file_exists($fullPath)) {
        unlink($fullPath);
        header("Location: gallery.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Gallery</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container">
    <h3>Uploaded Images</h3>
    <?php if (empty($images)): ?>
      <div class="alert alert-info">No images uploaded yet.</div>
    <?php else: ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Type</th>
            <th>Size (KB)</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($images as $img): 
            $file = basename($img);
            $type = $imageInfo[$file] ?? 'unknown';
            $size = round(filesize($img) / 1024, 2);
          ?>
          <tr>
            <td><img src="uploads/<?= $file ?>" width="60" height="60"></td>
            <td><?= $file ?></td>
            <td><?= $type ?></td>
            <td><?= $size ?></td>
            <td>
              <a href="gallery.php?delete=<?= $file ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</body>
</html>
