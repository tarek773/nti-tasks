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
    $employees = [
    "Ahmed" => 12000,
    "Sara" => 15000,
    "Khaled" => 11000,
    "Noura" => 13500,
    "Tarek" => 12500,
    "Mohamed" => 4000,
];
    array_filter($employees , function($salary){
            return $salary > 5000;
    });

    ?>
    <div class="container mt-4">
        <h4 class="text-success">Employees Salary</h4>
        <ul class="list-group">
            <?php foreach ($employees as $employee => $salary): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span><?= $employee ?></span>
                    <span class="badge bg-primary rounded-pill"><?=
                                                                $salary ?> EGP</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>