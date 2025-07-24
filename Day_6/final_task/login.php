<?php
session_start();

$usersFile = 'users.json';
$logFile = __DIR__ . '/logs/login.log';
$logDir = __DIR__ . '/logs';
$errors = [];

if (!file_exists($logDir)) {
    mkdir($logDir, 0777, true);
}

if (!file_exists($usersFile)) {
    file_put_contents($usersFile, json_encode([]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $users = json_decode(file_get_contents($usersFile), true);
    $time = date("Y-m-d H:i:s");

    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['username'] = $username;
        $_SESSION['allowed_users'][] = $username;

        file_put_contents($logFile, "[$time] - USER: $username - STATUS: SUCCESS" . PHP_EOL, FILE_APPEND);
        header("Location: dashboard.php");
        exit;
    } else {
        $errors[] = "Invalid credentials.";

        file_put_contents($logFile, "[$time] - USER: $username - STATUS: FAILURE" . PHP_EOL, FILE_APPEND);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2>Login</h2>
    <?php foreach ($errors as $e): ?>
      <div class="alert alert-danger"><?= $e ?></div>
    <?php endforeach; ?>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary">Login</button>
      <a href="register.php" class="btn btn-link">New user? Register</a>
    </form>
  </div>
</body>
</html>
