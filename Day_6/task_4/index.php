<?php
$message = "";

$folder = 'uploads/' . date('Y-m-d') . '/';
if (!file_exists($folder)) 
  mkdir($folder, 0777, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $allowed = ['image/jpeg', 'image/png'];
    $files = $_FILES['image'];

    foreach ($files['name'] as $index => $fileName) {
        if ($files['error'][$index] === 0) {
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $new_name = uniqid('img_', true) . '.' . $ext;
            $target = $folder . time() . "_" . $new_name;
            $type = $files['type'][$index];

            if (in_array($type, $allowed)) {
                move_uploaded_file($files['tmp_name'][$index], $target);
                $message .= " Uploaded: $fileName<br>";
            } else {
                $message .= " Invalid type: $fileName<br>";
            }
        }
    }
}

if (isset($_GET['delete'])) {
    $fileToDelete = $_GET['delete'];
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        $message = " Image deleted successfully.";
    } 
}

$images = file_exists($folder) ? glob($folder . "*.{jpg,jpeg,png}", GLOB_BRACE) : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Multi Image Upload</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
  <div class="container">
    <h2 class="mb-4">Upload Multiple Images</h2>

    <!-- Alert -->
    <?php if (!empty($message)): ?>
      <div class="alert alert-info"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="mb-4 p-3 bg-white shadow-sm rounded">
      <div class="mb-3">
        <label for="image" class="form-label">Select Images (jpg, png):</label>
        <input type="file" name="image[]" id="image" class="form-control" accept="image/jpeg, image/png" multiple required>
      </div>
      <button type="submit" class="btn btn-success">Upload</button>
    </form>

    <?php if (!empty($images)): ?>
      <div class="row">
        <?php foreach ($images as $img): ?>
          <div class="col-md-3 mb-4">
            <div class="card">
              <img src="<?= $img ?>" class="card-img-top" style="height: 180px; object-fit: cover;">
              <div class="card-body text-center">
                <a href="?delete=<?= urlencode($img) ?>" class="btn btn-danger btn-sm">Delete</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-warning">No images uploaded yet.</div>
    <?php endif; ?>
  </div>
</body>
</html>
