<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for ($i = 0; $i <= 20; $i+=5) {
        echo "Number: $i<br>";}

        echo "<br>method 2<br>";

    for ($i = 0; $i <= 20; $i++) {
        if ($i % 5 == 0) {
        echo "Number: $i<br>";}}
    ?>
</body>

</html>