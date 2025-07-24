<?php
function getStudentName($studentId, $conn)
{
    $query = "SELECT name FROM students WHERE id = $studentId";
    $result = mysqli_query($conn, $query);
    $student = mysqli_fetch_assoc($result);
    return htmlspecialchars($student['name']);
}
function getCourseTitle($courseId, $conn)
{
    $query = "SELECT title FROM courses WHERE id = $courseId";
    $result = mysqli_query($conn, $query);
    $course = mysqli_fetch_assoc($result);
    return htmlspecialchars($course['title']);
}
