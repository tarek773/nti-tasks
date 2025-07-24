<?php
session_start();

$usersFile = 'users.json';
if (!file_exists($usersFile)) {
    file_put_contents($usersFile, json_encode([]));
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $errors[] = "Username and password are required.";
    } else {
        $users = json_decode(file_get_contents($usersFile), true);
        if (isset($users[$username])) {
            $errors[] = "Username already exists.";
        } else {
            $users[$username] = password_hash($password, PASSWORD_DEFAULT);
            file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
            $_SESSION['username'] = $username;
            $_SESSION['allowed_users'][] = $username;
            header('Location: dashboard.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2>Register</h2>
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
      <button class="btn btn-primary">Register</button>
      <a href="login.php" class="btn btn-link">Already registered?</a>
    </form>
  </div>
</body>
</html>
