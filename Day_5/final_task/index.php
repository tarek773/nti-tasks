<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    
</head>

<body class="bg-info-subtle">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="shadow col-lg-6 p-5 bg-white rounded">

            <form action="welcome.php" method="post" class="was-validated">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control is-valid" id="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control is-valid" id="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>

                <p id="fill-text" class="btn btn-outline-secondary btn-sm mt-2">Use: admin@example.com / 12345678</p>
                <p id="fill-text-2" class="btn btn-outline-secondary btn-sm mt-2">Use: test@example.com / test1234</p>

            </form>
        </div>
    </div>

    <script>
        document.getElementById('fill-text').addEventListener('click', function() {
            document.getElementById('email').value = 'admin@example.com';
            document.getElementById('password').value = '12345678';
        });

        document.getElementById('fill-text-2').addEventListener('click', function() {
            document.getElementById('email').value = 'test@example.com';
            document.getElementById('password').value = 'test1234';
        });
    </script>

</body>

</html>