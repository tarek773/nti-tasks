<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="shadow col-lg-6 p-5 bg-white rounded">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == 'POST'):
                $file = $_FILES['image'];
                $allowed = ['image/jpeg', 'image/png'];
            endif;
            if (in_array($file['type'], $allowed) && $file['error'] == 0) {
                move_uploaded_file($file['tmp_name'], 'Uploads/' . $file['name']);
                echo "<div class='alert alert-success'>upload success</div>";
                echo "<img src='Uploads/{$file['name']}' class='img-thumbnail mt-3' wight='200px'>";
            } else {
                echo "<div class='alert alert-success'>file has error</div>";
            }
            ?>

        </div>
    </div>
</body>

</html>