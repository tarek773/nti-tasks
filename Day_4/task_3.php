<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-primary">

    <div class="container  text-white p-3">
        <div class="row justify-content-center mb-3">
            <ul class="list-group">

                <?php

                $employee = [
                    "name" => "Ahmed Ali",
                    "job_title" => "Software Engineer",
                    "department" => "IT",
                    "salary" => 12000
                ];

                foreach ($employee as $key => $value) {
                    echo "<li class='list-group-item'><b>" . $key . "</b> : " . $value  . "</li>";
                }
                ?>

            </ul>
        </div>
    </div>

</body>

</html>