<?php
session_start();
require './db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$userId = intval($user['id']);  

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $count = count($_FILES['images']['name']);
    $allowed = ['image/jpeg', 'image/png'];
    $productName = $_POST['productName'];
    $description = $_POST['description'];

    for ($i = 0; $i < $count; $i++) {
        $type = $_FILES['images']['type'][$i];
        $tmp = $_FILES['images']['tmp_name'][$i];

        if (in_array($type, $allowed)) {
            $imageContent = file_get_contents($tmp);
            $imageBase64 = base64_encode($imageContent);

            $name = mysqli_real_escape_string($conn, $productName);
            $desc = mysqli_real_escape_string($conn, $description);
            $image = mysqli_real_escape_string($conn, $imageBase64);

            $query = "INSERT INTO products (name, description, image_base64, user_id)
                      VALUES ('$name', '$desc', '$image', $userId)";
            mysqli_query($conn, $query);

            echo "<div class='alert alert-success'>Product saved successfully</div>";
        } else {
            echo "<div class='alert alert-warning'>File #" . ($i + 1) . " is not a valid image.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Products</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="shadow col-lg-10 mx-auto p-5 bg-white rounded">
            <h3 class="mb-4">Add New Product</h3>
            <form enctype="multipart/form-data" method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="productName" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                </div>
                <label class="form-label">Choose Image(s)</label>
                <input type="file" name="images[]" multiple class="form-control mb-3" required>
                <button type="submit" class="btn btn-primary w-100">Add Product</button>
            </form>

            <hr class="my-5">

            <h4 class="mb-4">Your Products</h4>
            <div class="row">
                <?php
                $query = "SELECT * FROM products WHERE user_id = $userId ORDER BY id DESC";
                $result = mysqli_query($conn, $query);
                while ($product = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card h-100 shadow-sm'>";
                    echo "<img src='data:image/jpeg;base64,{$product['image_base64']}' class='card-img-top' style='height:250px; object-fit:cover'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$product['name']}</h5>";
                    echo "<p class='card-text'>{$product['description']}</p>";
                    echo "<p class='card-text'><small class='text-muted'>Created by :{$_SESSION['user']['email']}</p>";
                    echo "</div></div></div>";
                }
                ?>
            </div>

            <a href="index.php" class="btn btn-danger w-100 mt-4">Logout</a>
        </div>
    </div>
</body>
</html>
