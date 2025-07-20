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
            <?php
            session_start();

            $users = [[
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => '12345678',
                'image_path' => ''
            ], [
                'name' => 'Test',
                'email' => 'test@example.com',
                'password' => 'test1234',
                'image_path' => ''
            ]];
            $_SESSION['users'] = $users;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = array_filter($users, function ($user) use ($email, $password) {
                return $user['email'] == $email && $user['password'] == $password;
            });

            if (!empty($user)) {
                $user = array_values($user)[0];
                echo "<div class='alert alert-success'>Welcome, " . $user['name'] . " !</div>";
                $_SESSION['user'] = $user;
                if (!empty($user['image_path'])) {
                    echo "<img src='{$user['image_path']}' class='img-thumbnail m-2' width='150'>";
                }
            } else {
                echo "<div class='alert alert-danger'>Invalid email or password.</div>";
                header("Refresh: 1; url=index.php");
            }

            ?>
            <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                <a href="index.php" class="btn btn-danger px-4">Logout</a>
                <a href="products.php" class="btn btn-success px-4">Products</a>
                <a href="register.php" class="btn btn-primary px-4">Create Account</a>
            </div>

        </div>
    </div>

</body>

</html>