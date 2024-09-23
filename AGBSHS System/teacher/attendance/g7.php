<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Grade 7</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* Main content styling */
main {
    margin-left: 250px; /* Push the main content to the right by the width of the sidebar */
    padding: 20px;
    background-color: #f1f2f6;
    min-height: 100vh;
    color: #2d3436;
}

.main-content {
    margin-left: 250px; /* Same as sidebar width to avoid overlap */
    padding: 20px;
    background-color: #fff;
    min-height: 100vh;
}

h1 {
    font-size: 24px;
    color: #2d3436;
    text-align: center;
    margin-bottom: 20px;
}

.flex-container {
    display: flex;
    justify-content: space-around;
    padding: 20px;
    gap: 15px;
}

.flex-container div {
    background-color: #0984e3;
    padding: 15px;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.flex-container div a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    display: flex;
    align-items: center;
}

.flex-container div a i {
    margin-right: 10px;
    font-size: 20px;
}

.flex-container div:hover {
    background-color: #74b9ff;
}

/* Button styling */
#previousButton {
    background-color: #0984e3;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

#previousButton:hover {
    background-color: #74b9ff;
}
</style>
</head>

<body>
<!-- Sidebar will be injected here -->
<div id="sidebar-placeholder"></div>

        <main>
            <h1>Antonino G. Busano Sr. High School Attendance Monitoring System</h1>
        </main>

        <div class="main-content">
            <button id="previousButton" onclick="goBack()">Previous</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            <div class="flex-container">
                <div><a href="g7/s1.php"><i class="fas fa-chalkboard-teacher"></i> Section 1</a></div>
                <div><a href="g7/s2.php"><i class="fas fa-book"></i> Section 2</a></div>
                <div><a href="#"><i class="fas fa-laptop-code"></i> Section 3</a></div>
                <div><a href="#"><i class="fas fa-users"></i> Section 4</a></div>
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