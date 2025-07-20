<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-info-subtle">

    <div class="d-flex justify-content-center align-items-center vh-100">



        <div class="shadow col-lg-6 p-5 bg-white rounded">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];
                    $allowed = ['image/jpeg', 'image/png'];

                    if (in_array($file['type'], $allowed) && $file['error'] == 0) {
                        move_uploaded_file($file['tmp_name'], 'Uploads/' . $file['name']);
                        echo "<div class='alert alert-success'>Upload success</div>";
                        echo "<img src='Uploads/{$file['name']}' class='img-thumbnail mt-3' width='200'>";
                    } else {
                        echo "<div class='alert alert-danger'>File type not allowed or error in upload</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>No file uploaded</div>";
                }
            }
            ?>

            <form  enctype="multipart/form-data" method="post">
                <label class="form-label">Choose photo</label>
                <input type="file" name="image" class="form-control mb-2" required>

                <button type="submit" class="btn btn-primary w-100">Upload</button>
            </form>
        </div>
    </div>

</body>

</html>