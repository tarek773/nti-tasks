<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <?php
    $products = [
        "Laptop" => 15000,
        "Mouse" => 250,
        "Keyboard" => 500,
        "Monitor" => 3000,
        "Headset" => 800
    ];
    arsort($products);

    ?>
    <div class="container mt-4">
        <h4 class="text-success">Product Price</h4>
        <ul class="list-group">
            <?php foreach ($products as $product => $price): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span><?= strtoupper($product) ?></span>
                    <span class="badge bg-primary rounded-pill"><?=
                                                                $price ?> EGP</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>