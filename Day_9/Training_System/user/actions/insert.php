<?php
require '../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role     = $_POST['role'];

    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image_name = time() . '_' . basename($_FILES['image']['name']);
        $target_dir = 'Uploads/';
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = $image_name;
        }
    }

    $sql = "INSERT INTO users (name, email, password, role, image_path) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssds', $name, $email, $password, $role, $target_file);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: ../show.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
