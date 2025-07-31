<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

require_once '../db/db.php';

parse_str(file_get_contents("php://input"), $data);

if (!isset($data['id']) || empty($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'Student ID is required']);
    exit;
}

$student_id = intval($data['id']);

$sql = "DELETE FROM students WHERE id = $student_id";
if ($conn->query($sql)) {
    echo json_encode(['success' => true, 'message' => 'Student deleted successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to delete student']);
}

$conn->close();
