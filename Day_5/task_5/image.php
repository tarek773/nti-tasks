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
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                $count = count($_FILES['images']['name']);
                $allowed = ['image/jpeg', 'image/png'];


                for ($i = 0; $i < $count; $i++) {
                    $type = $_FILES['images']['type'][$i];
                    $tmp = $_FILES['images']['tmp_name'][$i];
                    $name = $_FILES['images']['name'][$i];

                    if (in_array($type, $allowed)) {
                        move_uploaded_file($tmp, "Uploads/$name");
                        echo "<div class='alert alert-success'>upload success</div>";
                        echo "<img src='Uploads/$name' class='img-thumbnail m-2' width='150'>";
                    } else {
                        echo "<div class='alert alert-warning'>upload faild</div>";
                    }
                }
            }
            ?>

        </div>
    </div>
</body>

</html>