<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../db/db.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    echo json_encode($students);
} else {
    echo json_encode([]);
}

$conn->close();
