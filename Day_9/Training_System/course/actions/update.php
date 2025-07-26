<?php
require 'D:\Xampp\htdocs\nti\Day_8\Training_System\db\db.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $hours = $_POST['hours'];
    $price = $_POST['price'];
    $sql = "UPDATE courses SET title=?, description=?, hours=?, price=? WHERE id=?";

    $stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssdii", $title, $description, $hours, $price, $id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: ../show.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
