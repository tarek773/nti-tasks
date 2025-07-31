<?php 
$conn = mysqli_connect("localhost:3308", "root", "", "training_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}