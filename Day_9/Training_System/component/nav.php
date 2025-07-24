<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="../dashboard/dashboard.php">Training System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="../student/show.php">Student</a></li>
        <li class="nav-item"><a class="nav-link" href="../course/show.php">Course</a></li>
        <li class="nav-item"><a class="nav-link" href="../enrollment/show.php">Enrollment</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-danger" href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
