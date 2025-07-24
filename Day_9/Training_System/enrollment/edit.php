<?php require '../db/db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Enrollment</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body class="bg-light">
    <?php include '../component/nav.php'; ?>

    <?php
    $query = "SELECT * FROM enrollments WHERE id = {$_GET['id']}";
    $result = mysqli_query($conn, $query);
    $enrollment = mysqli_fetch_assoc($result);
    ?>

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white py-3">
                <h4 class="mb-0">Edit Student</h4>
            </div>
            <div class="card-body px-4 py-4">
                <form method="POST" action="./actions/update.php?id=<?= $_GET['id'] ?>">


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
                    </div>
  

                    <div class="mb-3">
                        <label for="grade" class="form-label">grade</label>
                        <input type="number" value="<?= htmlspecialchars($enrollment['grade']) ?>"  name="grade" id="grade" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Update Enrollment</button>
                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    $studentQuery = "SELECT * FROM students WHERE id = " . intval($_GET['student_id']);
    $studentResult = mysqli_query($conn, $studentQuery);
    $student = mysqli_fetch_assoc($studentResult);

    $courseQuery = "SELECT * FROM courses WHERE id = " . intval($_GET['course_id']);
    $courseResult = mysqli_query($conn, $courseQuery);
    $course = mysqli_fetch_assoc($courseResult);
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("student_name").value = <?= json_encode($student['id']) ?>;
        document.getElementById("course_title").value = <?= json_encode($course['id']) ?>;
    });
</script>


</body>

</html>
