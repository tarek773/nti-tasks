<?php
require '../../db/db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $role  = $_POST['role'];

    

    
        $sql = "UPDATE users SET role = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ii',  $role, $id);
    

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../show.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
