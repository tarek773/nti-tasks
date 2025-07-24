<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_user'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        $_SESSION['users'][] = [
            'name' => $name,
            'email' => $email
        ];
    } elseif (isset($_POST['clear_all'])) {
        $_SESSION['users'] = []; 
    } elseif (isset($_POST['remove_last'])) {
        array_pop($_SESSION['users']); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Session User List</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
  <div class="container">
    <h2 class="mb-4">User List in Session</h2>

    <form method="POST" class="border rounded p-4 bg-white shadow-sm mb-4">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
    </form>

    <form method="POST" class="mb-4">
      <button type="submit" name="remove_last" class="btn btn-warning me-2">Remove Last User</button>
      <button type="submit" name="clear_all" class="btn btn-danger">Clear All Users</button>
    </form>

    <?php if (!empty($_SESSION['users'])): ?>
      <h4>Saved Users:</h4>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION['users'] as $index => $user): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= htmlspecialchars($user['name']) ?></td>
              <td><?= htmlspecialchars($user['email']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="alert alert-danger">No users saved in session.</div>
    <?php endif; ?>
  </div>
</body>
</html>
