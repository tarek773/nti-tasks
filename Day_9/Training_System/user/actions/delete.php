<?php
require '../../db/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../show.php');
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
