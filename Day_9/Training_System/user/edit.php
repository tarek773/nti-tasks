<?php require '../db/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User Role</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-light">
    <?php include '../component/nav.php'; ?>

    <?php
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white py-3">
                <h4 class="mb-0">Edit User Role</h4>
            </div>
            <div class="card-body px-4 py-4">
                <form method="POST" action="./actions/update.php?id=<?= $user['id'] ?>">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" value="<?= htmlspecialchars($user['name']) ?>" class="form-control" disabled>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" value="<?= htmlspecialchars($user['email']) ?>" class="form-control" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>User</option>
                            <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Admin</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Update Role</button>
                        <a href="show.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
