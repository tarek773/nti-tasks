<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["message" => "Only POST method is allowed"]);
    exit;
}

require_once '../db/db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['name']) || empty($data['name'])) {
    http_response_code(400);
    echo json_encode(["message" => "Name is required"]);
    exit;
}

$name = $conn->real_escape_string($data['name']);
$email = isset($data['email']) ? $conn->real_escape_string($data['email']) : null;
$phone = isset($data['phone']) ? $conn->real_escape_string($data['phone']) : null;
$dob = isset($data['date_of_birth']) ? $conn->real_escape_string($data['date_of_birth']) : null;

$sql = "INSERT INTO students (name, email, phone, date_of_birth) 
        VALUES (
            '$name', 
            " . ($email ? "'$email'" : "NULL") . ", 
            " . ($phone ? "'$phone'" : "NULL") . ", 
            " . ($dob ? "'$dob'" : "NULL") . "
        )";

if ($conn->query($sql)) {
    http_response_code(201);
    echo json_encode(["message" => "Student created successfully", "id" => $conn->insert_id]);
} else {
    http_response_code(500);
    echo json_encode(["message" => "Failed to create student"]);
}

$conn->close();
