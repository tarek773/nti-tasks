<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    echo json_encode(["message" => "Student ID is required"]);
    exit;
}

require_once '../db/db.php';

$id = intval($_GET['id']);

$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $student = $result->fetch_assoc();
    echo json_encode($student);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Student not found"]);
}

$conn->close();
