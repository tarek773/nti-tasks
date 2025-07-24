<?php
require 'D:\Xampp\htdocs\nti\Day_8\Training_System\db\db.php';
   $id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $hours = $_POST['hours'];
    $price = $_POST['price'];
    $sql = "UPDATE courses SET title='$title', description='$description', hours='$hours', price='$price' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: ../show.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
