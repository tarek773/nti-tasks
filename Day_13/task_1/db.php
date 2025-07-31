<?php

header("Content-Type: application/json");

$conn = new mysqli("localhost:3308", "root", "", "training_system");
if ($conn->connect_error) {
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}