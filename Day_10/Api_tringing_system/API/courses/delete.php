<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: DELETE");

if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
  http_response_code(405);
  echo json_encode(["message" => "Method not allowed"]);
  exit;
}

require '../db/db.php'; 

if (!isset($_GET['id'])) {
  http_response_code(400);
  echo json_encode(["message" => "Missing course ID"]);
  exit;
}

$course_id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
$stmt->bind_param("i", $course_id);

if ($stmt->execute()) {
  echo json_encode(["message" => "Course deleted successfully"]);
} else {
  http_response_code(500);
  echo json_encode(["message" => "Failed to delete course"]);
}

$stmt->close();
$conn->close();
