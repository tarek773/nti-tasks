<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Images</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-light py-5">

    <div class="container">
        <div class="shadow col-lg-8 mx-auto p-5 bg-white rounded">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                $count = count($_FILES['images']['name']);
                $allowed_extensions = ['jpg', 'jpeg','png'];
                $max_size = 4 * 1024 * 1024; // 4MB
                $errors = [];

                for ($i = 0; $i < $count; $i++) {
                    $name = $_FILES['images']['name'][$i];
                    $type = $_FILES['images']['type'][$i];
                    $size = $_FILES['images']['size'][$i];
                    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

                    if (!in_array($ext, $allowed_extensions)) {
                        $errors[] = " $name: امتداد غير مسموح ($ext)";
                    }

                    if ($size > $max_size) {
                        $errors[] = " $name: الحجم أكبر من 4MB";
                    }
                }

                if (!empty($errors)) {
                    foreach ($errors as $err) {
                        echo "<div class='alert alert-danger'>$err</div>";
                    }
                    echo "<div class='alert alert-warning'> لم يتم رفع أي ملف بسبب وجود أخطاء</div>";
                } else {
                    for ($i = 0; $i < $count; $i++) {
                        $tmp = $_FILES['images']['tmp_name'][$i];
                        $name = $_FILES['images']['name'][$i];
                        move_uploaded_file($tmp, "Uploads/$name");

                        echo "<div class='alert alert-success'>$name تم رفعه بنجاح </div>";
                        echo "<img src='Uploads/$name' class='img-thumbnail m-2' width='150'>";
                    }
                }
            }
            ?>

            <form method="POST" enctype="multipart/form-data">
                <label for="images">اختر الصور:</label>
                <input type="file" name="images[]" multiple class="form-control mb-3" required>
                <button class="btn btn-primary">رفع الصور</button>
            </form>
        </div>
    </div>

</body>

</html>
