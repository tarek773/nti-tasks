<?php
require 'D:\Xampp\htdocs\nti\Day_8\Training_System\db\db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $phone =  $_POST['phone'];
    $dob =  $_POST['dob'];

    $sql = "INSERT INTO students (name, email, phone, date_of_birth) VALUES ('$name', '$email', '$phone', '$dob')";
    if (mysqli_query($conn, $sql)) {
        header('Location: ../show.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
