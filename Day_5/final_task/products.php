<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-info-subtle ">
    <div class="container d-flex justify-content-center py-5"> 
        <div class="shadow col-lg-8 mx-auto p-5 bg-white rounded">
            <?php
            session_start();
            if (!isset($_SESSION['user'])) {
                header("Location: login.php");
                exit();
            }   
            
            

            if ($_SERVER["REQUEST_METHOD"] == 'POST') {

                $count = count($_FILES['images']['name']);
                $allowed = ['image/jpeg', 'image/png'];
                $productName = $_POST['productName'];
                $description = $_POST['description'];
                $user = $_SESSION['user'];
                $_SESSION['products'] = [];


                for ($i = 0; $i < $count; $i++) {
                    $type = $_FILES['images']['type'][$i];
                    $tmp = $_FILES['images']['tmp_name'][$i];
                    $name = $_FILES['images']['name'][$i];

                    if (in_array($type, $allowed)) {

                        $_SESSION['products'][] = [
                            'name' => $productName,
                            'description' => $description,
                            'image' => "Uploads/$name",
                            'user' => $user['email']
                        ];

                        move_uploaded_file($tmp, "Uploads/$name");

                        echo "<div class='alert alert-success'><img src='Uploads/$name' class='img-thumbnail m-2' width='300'>
                         <h5 >Product: $productName</h5>
                        <p >Description: $description</p>
                        <p ><b>Created by: {$user['email']}</b></p></div>";

                    } else {
                        echo "<div class='alert alert-warning'>upload faild</div>";
                    }
                }
            }
            ?>

            <form enctype="multipart/form-data" method="post" >


                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="productName" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                </div>

                <label class="form-label">Choose Image</label>
                <input type="file" name="images[]" multiple class="form-control mb-2" required>

                <button type="submit" class="btn btn-primary w-100 mb-3">Add Products</button>
            </form>

            <a href="index.php" class="btn btn-danger w-100 mb-3">logout</a>
            

        </div>
    </div>
</body>

</html>