<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap المحلي -->
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="mb-4 text-center">Student Registration</h2>

    <form class="row g-3">
      <div class="col-md-6">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control is-invalid" id="name" required>
        <div class="invalid-feedback">Please enter your full name.</div>
      </div>

      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control is-invalid" id="email" required>
        <div class="invalid-feedback">Enter a valid email address.</div>
      </div>

      <div class="col-md-4">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control is-invalid" id="age" min="1" required>
        <div class="invalid-feedback">Please enter your age.</div>
      </div>

      <div class="col-md-4">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select is-invalid" id="gender" required>
          <option selected disabled value="">Choose...</option>
          <option>Male</option>
          <option>Female</option>
        </select>
        <div class="invalid-feedback">Please select gender.</div>
      </div>

      <div class="col-md-4">
        <label for="grade" class="form-label">Grade (0 - 100)</label>
        <input type="number" class="form-control is-invalid" id="grade" min="0" max="100" required>
        <div class="invalid-feedback">Enter a grade between 0 and 100.</div>
      </div>

      <div class="col-12">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control is-invalid" id="notes" rows="3"></textarea>
        <div class="invalid-feedback">You can leave a comment.</div>
      </div>

      <div class="col-12 d-flex justify-content-between">
        <button class="btn btn-success" type="submit">Submit</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentsModal">
          Show Students
        </button>
      </div>
    </form>
  </div>

  <div class="modal fade" id="studentsModal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="studentsModalLabel">Registered Students</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Grade</th>
                <th>Evaluation</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $students = [
                  ['name' => 'Ali Ahmed', 'email' => 'ali@mail.com', 'age' => 20, 'gender' => 'Male', 'grade' => 92],
                  ['name' => 'Sara Mostafa', 'email' => 'sara@mail.com', 'age' => 22, 'gender' => 'Female', 'grade' => 68],
                  ['name' => 'Youssef Nabil', 'email' => 'youssef@mail.com', 'age' => 19, 'gender' => 'Male', 'grade' => 47]
                ];

                foreach ($students as $index => $student) {
                  $grade = $student['grade'];
                  if ($grade >= 85) {
                    $eval = "Excellent";
                  } elseif ($grade >= 70) {
                    $eval = "Good";
                  } elseif ($grade >= 50) {
                    $eval = "Pass";
                  } else {
                    $eval = "Fail";
                  }

                  echo "<tr>
                    <td>" . ($index + 1) . "</td>
                    <td>{$student['name']}</td>
                    <td>{$student['email']}</td>
                    <td>{$student['age']}</td>
                    <td>{$student['gender']}</td>
                    <td>{$student['grade']}</td>
                    <td>$eval</td>
                  </tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap المحلي -->
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="mb-4 text-center">Student Registration</h2>

    <form class="row g-3">
      <div class="col-md-6">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control is-invalid" id="name" required>
        <div class="invalid-feedback">Please enter your full name.</div>
      </div>

      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control is-invalid" id="email" required>
        <div class="invalid-feedback">Enter a valid email address.</div>
      </div>

      <div class="col-md-4">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control is-invalid" id="age" min="1" required>
        <div class="invalid-feedback">Please enter your age.</div>
      </div>

      <div class="col-md-4">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select is-invalid" id="gender" required>
          <option selected disabled value="">Choose...</option>
          <option>Male</option>
          <option>Female</option>
        </select>
        <div class="invalid-feedback">Please select gender.</div>
      </div>

      <div class="col-md-4">
        <label for="grade" class="form-label">Grade (0 - 100)</label>
        <input type="number" class="form-control is-invalid" id="grade" min="0" max="100" required>
        <div class="invalid-feedback">Enter a grade between 0 and 100.</div>
      </div>

      <div class="col-12">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control is-invalid" id="notes" rows="3"></textarea>
        <div class="invalid-feedback">You can leave a comment.</div>
      </div>

      <div class="col-12 d-flex justify-content-between">
        <button class="btn btn-success" type="submit">Submit</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentsModal">
          Show Students
        </button>
      </div>
    </form>
  </div>

  <div class="modal fade" id="studentsModal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="studentsModalLabel">Registered Students</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Grade</th>
                <th>Evaluation</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $students = [
                  ['name' => 'Ali Ahmed', 'email' => 'ali@mail.com', 'age' => 20, 'gender' => 'Male', 'grade' => 92],
                  ['name' => 'Sara Mostafa', 'email' => 'sara@mail.com', 'age' => 22, 'gender' => 'Female', 'grade' => 68],
                  ['name' => 'Youssef Nabil', 'email' => 'youssef@mail.com', 'age' => 19, 'gender' => 'Male', 'grade' => 47]
                ];

                foreach ($students as $index => $student) {
                  $grade = $student['grade'];
                  if ($grade >= 85) {
                    $eval = "Excellent";
                  } elseif ($grade >= 70) {
                    $eval = "Good";
                  } elseif ($grade >= 50) {
                    $eval = "Pass";
                  } else {
                    $eval = "Fail";
                  }

                  echo "<tr>
                    <td>" . ($index + 1) . "</td>
                    <td>{$student['name']}</td>
                    <td>{$student['email']}</td>
                    <td>{$student['age']}</td>
                    <td>{$student['gender']}</td>
                    <td>{$student['grade']}</td>
                    <td>$eval</td>
                  </tr>";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.js"></script>
</body>
</html>
>>>>>>> 806d7ec577e673210db879bd31339896620e2867
