<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-primary">
    <?php
    $courses = ["PHP", "JS", "CSS", "HTML"];
    array_push($courses, 'MySQL');

    array_unshift($courses, "Git");

    array_shift($courses);
    ?>

    <div class="container  text-white p-3">
        <div class="row justify-content-center ">
            <ul class="list-group container">
        <h1 class="text-white">Available Course</h1>
        <?php
        foreach ($courses as $course)
            echo  "<li class='list-group-item'>$course</li>"
        ?>
    </ul>
        </div>
    </div>

    
</body>

</html>