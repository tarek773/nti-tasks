<?php
require '../db/db.php';
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
        'role' => $row['role'],
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-info-subtle">

    <?php include '../component/nav.php' ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="shadow col-lg-6 p-5 bg-white rounded">

            <?php if ($user) {
                $_SESSION['user'] = $user;
            } ?>

            <?php if (($user) or isset($_SESSION['user'])) : ?>
                <?php
                // $_SESSION['user'] = $user;
                // var_dump($_SESSION['user']);
                $user = $_SESSION['user'];
                echo "<div class='alert alert-success'>Welcome, <strong>{$user['name']}" . (($user['role'] == 1) ? '(Admin)' : '(User)') . "</strong>!</div>";
                if (!empty($user['image_path'])) {
                    echo "<img src='{$user['image_path']}' class='img-thumbnail my-3' width='150'>";
                }
                ?>
                <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                    <a href="../student/show.php" class="btn btn-primary px-4">Students</a>
                    <a href="../course/show.php" class="btn btn-primary px-4">Courses</a>
                    <a href="../enrollment/show.php" class="btn btn-primary px-4">Enrollments</a>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">Invalid email or password.</div>
                <?php header("Refresh: 2; url=../index.php"); ?>
            <?php endif; ?>

        </div>
    </div>
</body>

</html>