<?php
require './db.php';
session_start();

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'email' => $row['email'],
        'password' => $row['password'],
        'image_path' => $row['image_path'] ?? null
    ];
}


$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$user = null;
foreach ($users as $u) {
    if ($u['email'] === $email && password_verify($password, $u['password'])) {
        $user = $u;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body class="bg-info-subtle">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="shadow col-lg-6 p-5 bg-white rounded">

            <?php if ($user): ?>
                <?php
                    $_SESSION['user'] = $user;
                    // var_dump($_SESSION['user']);
                    echo "<div class='alert alert-success'>Welcome, <strong>{$user['name']}</strong>!</div>";
                    if (!empty($user['image_path'])) {
                        echo "<img src='{$user['image_path']}' class='img-thumbnail my-3' width='150'>";
                    }
                ?>
                <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                    <a href="index.php" class="btn btn-danger px-4">Logout</a>
                    <a href="products.php" class="btn btn-success px-4">Products</a>
                    <!-- <a href="register.php" class="btn btn-primary px-4">Create Account</a> -->
                </div>
            <?php else: ?>
                <div class="alert alert-danger">Invalid email or password.</div>
                <?php header("Refresh: 2; url=index.php"); ?>
            <?php endif; ?>

        </div>
    </div>
</body>
</html>
