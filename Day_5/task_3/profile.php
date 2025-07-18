<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-light">
    <?php
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $age = $_POST['age'] ?? '';
    $city = $_POST['city'] ?? '';
    ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-5 shadow text-center bg-white rounded col-lg-6">
            
            <h4 class="text-success mb-4">User Details</h4>
            <ul class="list-group">
                <?php foreach ($_POST as $key => $value): ?>
                    <li class="list-group-item d-flex justify-content-lg-start">
                        <strong><?= ucfirst($key) ?> : </strong>
                        <span> <?= htmlspecialchars($value) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>
