<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Students Table</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>

<?php
$students = [
    ["name" => "Ahmed", "course" => "Math", "grade" => 85],
    ["name" => "Sara", "course" => "Physics", "grade" => 72],
    ["name" => "Omar", "course" => "Chemistry", "grade" => 48],
    ["name" => "Mona", "course" => "Biology", "grade" => 95],
    ["name" => "Youssef", "course" => "English", "grade" => 38]
];
?>

<div class="container py-5">
  <h2 class="mb-4">Student Grades</h2>
  <table class="table table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Course</th>
        <th>Grade</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($students as $index => $student): ?>
        <?php
          $rowClass = ($student['grade'] < 50) ? 'table-danger' : '';
        ?>
        <tr class="<?= $rowClass ?>">
          <th><?= $index + 1 ?></th>
          <td><?= $student['name'] ?></td>
          <td><?= $student['course'] ?></td>
          <td><?= $student['grade'] ?></td>
          <td>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#studentModal<?= $index ?>">
              Show
            </button>
          </td>
        </tr>

        <!-- Modal for this student -->
        <div class="modal fade" id="studentModal<?= $index ?>" tabindex="-1" aria-labelledby="studentModalLabel<?= $index ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              
              <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel<?= $index ?>">Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <p><strong>Name:</strong> <?= $student['name'] ?></p>
                <p><strong>Course:</strong> <?= $student['course'] ?></p>
                <p><strong>Grade:</strong> <?= $student['grade'] ?></p>
                <p><strong>Status:</strong> <?= ($student['grade'] < 50) ? 'Failed' : 'Passed' ?></p>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
