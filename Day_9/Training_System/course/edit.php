<?php require '../db/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Course</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-light">
    <?php include '../component/nav.php'; ?>

    <?php
    $query = "SELECT * FROM courses WHERE id = {$_GET['id']}";
    $result = mysqli_query($conn, $query);
    $course = mysqli_fetch_assoc($result);
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white py-3">
                <h4 class="mb-0">Edit Course</h4>
            </div>
            <div class="card-body px-4 py-4">
                <form method="POST" action="./actions/update.php?id=<?= $_GET['id'] ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Course Title</label>
                        <input type="text" value="<?= htmlspecialchars($course['title']) ?>" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="email" value="<?= htmlspecialchars($course['description']) ?>" name="description" id="description" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="hours" class="form-label">Hours</label>
                        <input type="number" value="<?= htmlspecialchars($course['hours']) ?>" name="hours" id="hours" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" value="<?= htmlspecialchars($course['price']) ?>" name="price" id="price" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Update Student</button>
                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
