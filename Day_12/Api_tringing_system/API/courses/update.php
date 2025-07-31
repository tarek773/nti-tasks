<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405);
    echo json_encode(["message" => "Only PUT method allowed"]);
    exit;
}

// Get and validate input
$data = json_decode(file_get_contents("php://input"), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(["message" => "Invalid JSON data"]);
    exit;
}

$requiredFields = ['id', 'title', 'description', 'hours', 'price'];
foreach ($requiredFields as $field) {
    if (!isset($data[$field])) {
        http_response_code(400);
        echo json_encode(["message" => "Missing required field: $field"]);
        exit;
    }
}

// Validate data types
$id = filter_var($data['id'], FILTER_VALIDATE_INT);
$name = trim($data['title']);
$description = trim($data['description']);
$hours = filter_var($data['hours'], FILTER_VALIDATE_INT);
$price = filter_var($data['price'], FILTER_VALIDATE_FLOAT);

if (!$id || !$name || !$description || $hours === false || $price === false) {
    http_response_code(400);
    echo json_encode(["message" => "Invalid input data"]);
    exit;
}

// Database operations
require_once '../db/db.php';

try {
    $conn->autocommit(FALSE); // Start transaction
    
    // Check if course exists
    $checkStmt = $conn->prepare("SELECT id FROM courses WHERE id = ?");
    $checkStmt->bind_param("i", $id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    
    if ($checkResult->num_rows === 0) {
        http_response_code(404);
        echo json_encode(["message" => "Course not found"]);
        exit;
    }
    
    // Update course
    $updateStmt = $conn->prepare("UPDATE courses SET title=?, description=?, hours=?, price=? WHERE id=?");
    $updateStmt->bind_param("ssidi", $name, $description, $hours, $price, $id);
    $updateStmt->execute();
    
    if ($updateStmt->affected_rows === 0) {
        $conn->rollback();
        http_response_code(200);
        echo json_encode(["message" => "No changes made to the course"]);
        exit;
    }
    
    $conn->commit();
    echo json_encode(["message" => "Course updated successfully"]);
    
} catch (Exception $e) {
    $conn->rollback();
    http_response_code(500);
    echo json_encode([
        "message" => "Failed to update course",
        "error" => $e->getMessage()
    ]);
} finally {
    if (isset($checkStmt)) $checkStmt->close();
    if (isset($updateStmt)) $updateStmt->close();
    $conn->autocommit(TRUE);
    $conn->close();
}
?>