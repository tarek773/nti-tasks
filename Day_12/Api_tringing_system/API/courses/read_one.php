<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");

require_once '../db/db.php';

// Validate ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id <= 0) {
    http_response_code(400);
    echo json_encode(["message" => "Invalid course ID"]);
    exit;
}

try {
    $stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        http_response_code(404);
        echo json_encode(["message" => "Course not found"]);
        exit;
    }
    
    $course = $result->fetch_assoc();
    echo json_encode($course);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "message" => "Failed to retrieve course",
        "error" => $e->getMessage()
    ]);
} finally {
    $stmt->close();
    $conn->close();
}
?>