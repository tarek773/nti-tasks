<?php
session_start();


require './db/db.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $file = $_FILES['image'];
    $allowed = ['image/jpeg', 'image/png'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    if (in_array($file['type'], $allowed) && $file['error'] == 0) {
        $uploadPath = 'Uploads/' . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $uploadPath);

        $query = "INSERT INTO users (name, email, password, image_path) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password, $uploadPath);
        mysqli_stmt_execute($stmt);

        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'image_path' => $uploadPath
        ];

        echo "<div class='alert alert-success text-center'>
                <img src='{$uploadPath}' class='img-thumbnail m-2' width='300'>
                <h5><b>Name: {$name}</b></h5>
                <p>Email: {$email}</p>
                <a href='./dashboard/dashboard.php' class='btn btn-primary w-100 mt-3'>Go To Dashboard</a>
              </div>";
    } else {
        echo "<div class='alert alert-danger'>File error or unsupported type.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body class="bg-info-subtle">
    <div class="container d-flex justify-content-center py-5">
        <div class="shadow col-lg-8 mx-auto p-5 bg-white rounded">
            <h3 class="mb-4 text-center">Register New User</h3>
            <form enctype="multipart/form-data" method="post">
                <label class="form-label">User Name</label>
                <input type="text" name="name" class="form-control mb-2" required>

                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control mb-2" required>

                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control mb-2" required>

                <label class="form-label">Choose photo</label>
                <input type="file" name="image" class="form-control mb-2" required>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
