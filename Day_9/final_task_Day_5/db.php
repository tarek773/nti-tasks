<?php 
$conn = mysqli_connect("localhost", "root", "", "Admin");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}