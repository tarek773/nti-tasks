<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Enrollment</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-light">
    <?php
        require '../db/db.php';
     include '../component/nav.php';
     include 'function.php' 
     ?>


    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-success text-white py-3">
                <h4 class="mb-0">Add New Enrollment</h4>
            </div>

            <div class="card-body px-4 py-4">
                <form method="POST" action="./actions/insert.php">
                    
                    <div class="mb-3">
                        <label for="student_name" class="form-label">Student Name</label>
                        <select name="student_id" id="student_name" class="form-select" required>
                            <?php
                            $query = "SELECT * FROM students";
                            $students =mysqli_query($conn, $query);
                            foreach ($students as $student) {
                                echo "<option value='" . htmlspecialchars($student['id']) . "'>" . htmlspecialchars($student['name']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="course_title" class="form-label">Course Title</label>
                        <select name="course_id" id="course_title" class="form-select" required>
                            <?php
                            $query = "SELECT * FROM courses";
                            $courses =mysqli_query($conn, $query);
                            foreach ($courses as $course) {
                                echo "<option value='" . htmlspecialchars($course['id']) . "'>" . htmlspecialchars($course['title']) . "</option>";
                            }
                            ?>
                        </select>

                    <div class="mb-3 mt-2">
                        <label for="grade" class="form-label">grade</label>
                        <input type="number" name="grade" id="grade" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Save Enrollment</button>
                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
