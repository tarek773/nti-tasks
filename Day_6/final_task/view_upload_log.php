<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$logFile = __DIR__ . '/logs/uploads.log';
$logLines = file_exists($logFile) ? file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Logs</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container mt-4">
    <h3 class="mb-4">Upload Logs</h3>

    <?php if (empty($logLines)): ?>
      <div class="alert alert-info">No uploads recorded yet.</div>
    <?php else: ?>
      <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
          <tr>
            <th>Timestamp</th>
            <th>User</th>
            <th>Type</th>
            <th>Full Path</th>
            <th>MIME Type</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($logLines as $line): ?>
            <?php
              $pattern = '/\[(.*?)\] - USER: (.*?) - TYPE: (.*?) - PATH: (.*?) - MIME: (.*)/';
              if (preg_match($pattern, $line, $matches)) {
                  $timestamp = $matches[1];
                  $user = $matches[2];
                  $type = $matches[3];
                  $fullPath = $matches[4];
                  $mime = $matches[5];
                  $filename = ($fullPath);
              } else {
                  continue;
              }
            ?>
            <tr>
              <td><?= htmlspecialchars($timestamp) ?></td>
              <td><?= htmlspecialchars($user) ?></td>
              <td><?= htmlspecialchars(ucfirst($type)) ?></td>
              <td><?= htmlspecialchars($filename) ?></td>
              <td><?= htmlspecialchars($mime) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</body>
</html>
