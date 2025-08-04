<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 3rem;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="card p-5 bg-white">
            <h1 class="mb-4 text-primary">👋 Welcome to Our Laravel App!</h1>
            <p class="lead">This is a simple landing page to get you started.</p>
            <a href="{{ route('articles.index') }}" class="btn btn-primary mt-4">Go to Articles</a>
        </div>
    </div>
</body>
</html>
