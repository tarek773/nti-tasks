<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">

</head>

<body class="bg-info-subtle">
    <div class="container d-flex justify-content-center py-5">
        <div class="shadow col-lg-8 mx-auto p-5 bg-white rounded">

            <?php
            session_start();
            if (!isset($_SESSION['user'])) {
                header('Location: login.php');
                exit();
            }

            if ($_SERVER["REQUEST_METHOD"] == 'POST'){
                $file = $_FILES['image'];
                $allowed = ['image/jpeg', 'image/png'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];

           
            if (in_array($file['type'], $allowed) && $file['error'] == 0) {
                move_uploaded_file($file['tmp_name'], 'Uploads/' . $file['name']);

                $new_user = [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'image_path' => "Uploads/{$file['name']}"
                ];


                $_SESSION['users'][] = $new_user;
                $_SESSION['user'] = $new_user;


                echo "<div class='alert alert-success'><img src='Uploads/{$file['name']}' class='img-thumbnail m-2' width='300'>
                         <h5 ><b>Name: {$new_user['name']}</b></h5>
                        <p >Email: {$new_user['email']}</p>

                        <a href='products.php' class='btn btn-primary w-100'>Go To Products</a>

                        </div>";
            } else {
                echo "<div class='alert alert-success'>file has error</div>";
            }}
            ?>

            <form enctype="multipart/form-data" method="post">


                <label class="form-label">User Name</label>
                <input type="text" name="name" class="form-control mb-2" required>

                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control mb-2" required>

                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control mb-2" required>

                <label class="form-label">Choose photo</label>
                <input type="file" name="image" class="form-control mb-2" required>

                <button type="submit" class="btn btn-primary w-100">Upload</button>
            </form>
        </div>
    </div>
</body>

</html>