<?php
require 'D:\Xampp\htdocs\nti\Day_8\Training_System\db\db.php';
   $id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', date_of_birth='$dob' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: ../show.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
