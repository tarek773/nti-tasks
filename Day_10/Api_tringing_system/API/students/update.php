<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405);
    echo json_encode(["message" => "Only PUT method is allowed"]);
    exit;
}

require_once '../db/db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (
    isset($data['id']) &&
    isset($data['name'])
) {
    $id = intval($data['id']);
    $name = $conn->real_escape_string($data['name']);
    $email = isset($data['email']) ? $conn->real_escape_string($data['email']) : null;
    $phone = isset($data['phone']) ? $conn->real_escape_string($data['phone']) : null;
    $dob = isset($data['date_of_birth']) ? $conn->real_escape_string($data['date_of_birth']) : null;

    $sql = "UPDATE students SET 
                name = '$name', 
                email = " . ($email ? "'$email'" : "NULL") . ", 
                phone = " . ($phone ? "'$phone'" : "NULL") . ", 
                date_of_birth = " . ($dob ? "'$dob'" : "NULL") . " 
            WHERE id = $id";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Student updated successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Failed to update student"]);
    }

    $conn->close();
} else {
    http_response_code(400);
    echo json_encode(["message" => "Missing required fields"]);
}
