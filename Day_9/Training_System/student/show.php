<?php require '../db/db.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training_System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body>
    <?php include '../component/nav.php'; ?>

    <div class="container">
        <h1 class="">Student list</h1>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1): ?>
            <a href="./add.php" class="btn btn-success mt-2">+ Add Student</a>
        <?php endif; ?>

        <!-- Add your student list display logic here -->
        <table class="table table-striped mt-4 shadow">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>

            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date_of_birth']) . "</td>";

                        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
                            echo "<td>";
                            echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> ";
                            echo "<a href='actions/delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                            echo "</td>";
                        }

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No students found</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>