<?php
header("Content-Type: application/json");
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["error" => "Only POST requests are allowed"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['title']) || empty($data['title'])) {
    echo json_encode(["error" => "Title is required"]);
    exit;
}

$title = $data['title'];
$description = $data['description'] ?? null;
$hours = $data['hours'] ?? null;
$price = $data['price'] ?? null;

$stmt = $conn->prepare("INSERT INTO courses (title, description, hours, price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssdd", $title, $description, $hours, $price);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "course_id" => $stmt->insert_id]);
} else {
    echo json_encode(["error" => "Insert failed"]);
}
?>
