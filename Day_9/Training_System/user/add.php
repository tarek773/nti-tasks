<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-light">
    <?php include '../component/nav.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-success text-white py-3">
                <h4 class="mb-0">Add New User</h4>
            </div>

            <div class="card-body px-4 py-4">
                <form method="POST" action="./actions/insert.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Profile Image (optional)</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save User</button>
                        <a href="show.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
