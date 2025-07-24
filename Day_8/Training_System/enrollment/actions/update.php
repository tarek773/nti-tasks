<?php
require 'D:\Xampp\htdocs\nti\Day_8\Training_System\db\db.php';
   $id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $student_id  =  $_POST['student_id'];
    $course_id  =  $_POST['course_id'];
    $grade =  $_POST['grade'];
    $enrollment_date = date('Y-m-d H:i:s');

    $sql = "UPDATE enrollments SET student_id='$student_id', course_id='$course_id', grade='$grade', enrollment_date='$enrollment_date' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: ../show.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
