<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["success" => false, "message" => "Only POST requests are allowed."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (
    !isset($data['title']) || empty($data['title']) ||
    !isset($data['description']) ||
    !isset($data['hours']) ||
    !isset($data['price'])
) {
    http_response_code(400); // Bad Request
    echo json_encode(["success" => false, "message" => "Missing or invalid fields."]);
    exit;
}

require_once("../db/db.php");

$stmt = $conn->prepare("INSERT INTO courses (title, description, hours, price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssdd", $data['title'], $data['description'], $data['hours'], $data['price']);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Course added successfully."]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Failed to add course."]);
}

$stmt->close();
$conn->close();
?>
