<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="container p-5">
        <div class="row">
            <table class="table table-hover table-striped">

                <tbody>


                    <tr>
                        <td><?= $_SERVER['PHP_SELF'] ?></td>
                    </tr>
                    <tr></tr>
                    <td><?= $_SERVER['REQUEST_METHOD'] ?></td>
                    </tr>
                    <tr></tr>
                    <td><?= $_SERVER['HTTP_USER_AGENT'] ?></td>
                    </tr>
                    <tr></tr>
                    <td><?= $_SERVER['SERVER_NAME'] ?></td>
                    </tr>
                    <tr></tr>
                    <td><?= $_SERVER['REMOTE_ADDR'] ?></td>
                    </tr>


                </tbody>
            </table>
</body>

</html>