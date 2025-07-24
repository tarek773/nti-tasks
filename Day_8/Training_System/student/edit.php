<?php require '../db/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-light">
    <?php include '../component/nav.php'; ?>

    <?php
    $query = "SELECT * FROM students WHERE id = {$_GET['id']}";
    $result = mysqli_query($conn, $query);
    $student = mysqli_fetch_assoc($result);
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white py-3">
                <h4 class="mb-0">Edit Student</h4>
            </div>
            <div class="card-body px-4 py-4">
                <form method="POST" action="./actions/update.php?id=<?= $_GET['id'] ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" value="<?= htmlspecialchars($student['name']) ?>" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" value="<?= htmlspecialchars($student['email']) ?>" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" value="<?= htmlspecialchars($student['phone']) ?>" name="phone" id="phone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" value="<?= htmlspecialchars($student['date_of_birth']) ?>" name="dob" id="dob" class="form-control" required>
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
