<?php
require 'D:\Xampp\htdocs\nti\Day_8\Training_System\db\db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $student_id  =  $_POST['student_id'];
    $course_id  =  $_POST['course_id'];
    $grade =  $_POST['grade'];
    $enrollment_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO enrollments (student_id, course_id, grade, enrollment_date) VALUES ('$student_id', '$course_id', '$grade', '$enrollment_date')";
    if (mysqli_query($conn, $sql)) {
        header('Location: ../show.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
