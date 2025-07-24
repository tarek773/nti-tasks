<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>

  <div class="container">
    <div class="alert alert-success mt-4">
      <h4>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h4>
      <p>You are now in your dashboard.</p>
    </div>
  </div>
</body>
</html>
