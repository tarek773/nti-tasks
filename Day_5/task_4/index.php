<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
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

                <form action="image.php" enctype="multipart/form-data" method="post">
                    <label class="form-label">Choose photo</label>
                    <input type="file" name="image" class="form-control mb-2" required>

                    <button type="submit" class="btn btn-primary w-100">Upload</button>
                </form>
            </div>
            

        </div>

    </body>

    </html>

</body>

</html>