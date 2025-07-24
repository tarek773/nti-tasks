<?php
require 'D:\Xampp\htdocs\nti\Day_8\Training_System\db\db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title =  $_POST['title'];
    $description =  $_POST['description'];
    $hours =  $_POST['hours'];
    $price =  $_POST['price'];

    $sql = "INSERT INTO courses (title, description, hours, price) VALUES ('$title', '$description', '$hours', '$price')";
    if (mysqli_query($conn, $sql)) {
        header('Location: ../show.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
