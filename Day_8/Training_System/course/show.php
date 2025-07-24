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
        <h1 class="">Courses list</h1>
        <a href="./add.php" class="btn btn-success mt-2">+ Add Course</a>

        <table class="table table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Hours</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM courses";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['hours']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> ";
                        echo "<a href='actions/delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No courses found</td></tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>