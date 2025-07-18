<?php
$user_ip = $_SERVER['REMOTE_ADDR'];

$request_method = $_SERVER['REQUEST_METHOD'];

// $user_ip = "127.0.0.1";

if ($user_ip === "127.0.0.1") {
    header("Location: denied.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="p-5 shadow text-center bg-white rounded col-lg-6">
            <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-lg-start">
                       <strong>User IP:</strong><?= $user_ip ?> 
                    </li>
                    <li class="list-group-item d-flex justify-content-lg-start">
                       <strong>Request Method:</strong><?=  $request_method ?> 
                    </li>
            </ul>

                <div class=" bg-success text-center text-white d-flex justify-content-center mt-5 w-50 align-items-center  ">Access denied: invalid host</div>

        </div>
    </div>        
</body>
</html>            


