<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = new mysqli("localhost:3308", "root", "", "training_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
