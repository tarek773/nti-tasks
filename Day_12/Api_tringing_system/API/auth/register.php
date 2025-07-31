<?php
require '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["success" => false, "message" => "Only POST method allowed"]);
    exit();
}

header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);

$name = $input['name'] ?? '';
$email = $input['email'] ?? '';
$password = $input['password'] ?? '';

if (empty($name) || empty($email) || empty($password)) {
    echo json_encode(["success" => false, "message" => "All fields are required"]);
    exit();
}

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Email already registered"]);
    exit();
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hashedPassword);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "User registered successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Registration failed"]);
}
?>
