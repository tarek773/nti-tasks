<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['grade'])) {
    $name = $_POST['name'];
    $grade = $_POST['grade'];

    $folder = "exports/" . date("Y-m-d");
    if (!file_exists($folder)) mkdir($folder, 0777, true);

    $file = fopen("$folder/students.csv", "a");
    fputcsv($file, [$name, $grade]);
    fclose($file);

    $message = " Saved to CSV successfully.";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = " Missing values.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Save Student to CSV</title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
  <div class="container">
    <h2 class="mb-4">Student CSV Form</h2>

    <?php if (isset($message)): ?>
      <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form id="studentForm" method="POST" class="border rounded bg-white p-4 shadow-sm" novalidate>
      <div class="mb-3">
        <label for="name" class="form-label">Student Name:</label>
        <input type="text" class="form-control" id="name" name="name" required onchange="checkFormStatus()">
      </div>

      <div class="mb-3">
        <label for="grade" class="form-label">Grade:</label>
        <input type="number" min="10" max="100" class="form-control" id="grade" name="grade" required onchange="checkFormStatus()">
      </div>

      <button id="submitBtn" type="submit" class="btn btn-outline-dark">Save to CSV</button>
    </form>
  </div>

  <script>
    function checkFormStatus() {
      const name = document.getElementById('name').value.trim();
      const grade = parseFloat(document.getElementById('grade').value);
      const btn = document.getElementById('submitBtn');

      if (name !== "" && !isNaN(grade) && grade >= 10 && grade <= 100) {
        btn.classList.remove("btn-outline-dark", "btn-danger");
        btn.classList.add("btn-success");
      } else {
        btn.classList.remove("btn-success");
        btn.classList.add("btn-danger");
      }
    }
  </script>
</body>
</html>
