<?php 

require 'D:\Xampp\htdocs\nti\Day_8\Training_System\db\db.php';
$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header('Location: ../show.php');
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}