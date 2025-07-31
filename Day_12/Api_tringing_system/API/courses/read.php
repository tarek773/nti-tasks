<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once '../db/db.php'; 
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);

$courses = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

echo json_encode($courses);
