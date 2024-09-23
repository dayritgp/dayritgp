<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <!-- Sidebar will be injected here -->
  <div id="sidebar-placeholder"></div>

    <main>
        <h1>Antonino G. Busano Sr. High School Attendance Monitoring System</h1>
    </main>

    <div class="main-content">

        <div class="flex-container">
            <div><a href="g7.php"><i class="fas fa-graduation-cap"></i> Grade 7</a></div>
            <div><a href="#"><i class="fas fa-book"></i> Grade 8</a></div>
            <div><a href="#"><i class="fas fa-chalkboard-teacher"></i> Grade 9</a></div>
            <div><a href="#"><i class="fas fa-school"></i> Grade 10</a></div>
        </div>
    </div>

  <script>
    // Load the sidebar from an external file
    fetch('sidebar.html')
      .then(response => response.text())
      .then(data => {
        document.getElementById('sidebar-placeholder').innerHTML = data;
      });
  </script>
</body>
</html>