<?php require '../db/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Training System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php include '../component/nav.php'; ?>

    <div class="container">
        <h1 class="mt-4">User List</h1>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1): ?>
            <a href="./add.php" class="btn btn-success mt-2">+ Add User</a>
        <?php endif; ?>

        <table class="table table-striped mt-4 shadow">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Image</th>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM users"; 
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";

                        // Convert role from number to text
                        $roleText = ($row['role'] == 1) ? 'Admin' : 'User';
                        echo "<td>$roleText</td>";

                        if (!empty($row['image_path'])) {
                            echo "<td><img src='../" . htmlspecialchars($row['image_path']) . "' alt='User Image' width='60'></td>";
                        } else {
                            echo "<td>No Image</td>";
                        }

                        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
                            echo "<td>";
                            echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                            echo "<a href='actions/delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
                            echo "</td>";
                        }

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
