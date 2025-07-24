<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$logFile = __DIR__ . '/logs/login.log';
$logLines = file_exists($logFile) ? file($logFile) : [];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Logs</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container">
    <h3>Login Logs</h3>
    <?php if (empty($logLines)): ?>
      <div class="alert alert-info">No login attempts recorded.</div>
    <?php else: ?>
      <pre class="bg-dark text-light p-3 rounded"><?= htmlspecialchars(implode("", $logLines)) ?></pre>
    <?php endif; ?>
  </div>
</body>
</html>
