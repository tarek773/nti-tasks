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

            <div class="list-group">
                <?php
                $books = ["Clean Code", "The Pragmatic Programmer", "Design 
                            Patterns", "You Don’t Know JS", "Eloquent JavaScript"];
                foreach ($books as $book) {
                    echo "<a href='#' class='list-group-item list-group-item-action'>$book</a>";
                }
                ?>

                

            </div>
        </div>
    </div>

</body>

</html>