<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <style>
    /* Reset some default styles */
body, h1, div, a, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fc;
}

main {
    padding: 20px;
    background-color: #f1f2f6;
    text-align: center;
    margin-left: 250px; /* Adjust this if the sidebar width changes */
    font-family: 'Arial', sans-serif;
    color: #2d3436;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-bottom: 3px solid #0984e3;
}

main h1 {
    font-size: 28px;
    margin: 0;
    color: #0984e3;
}

.main-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 40px;
    margin-left: 250px; /* To align with the sidebar */
    background-color: #ffffff;
}

.flex-container {
    display: flex;
    justify-content: space-around;
    width: 100%;
    gap: 20px;
    padding: 20px;
}

.flex-container div {
    background-color: #2d3436;
    padding: 20px;
    width: 200px;
    height: 150px;
    text-align: center;
    border-radius: 10px;
    color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, background-color 0.3s;
}

.flex-container div:hover {
    background-color: #0984e3;
    transform: scale(1.05);
}

.flex-container div a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
}

.flex-container div a i {
    display: block;
    font-size: 36px;
    margin-bottom: 10px;
}

/* Logout Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    text-align: center;
}

.modal-content p {
    font-size: 18px;
    margin-bottom: 20px;
}

.modal-content button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#confirmLogout {
    background-color: #d63031;
    color: #fff;
}

#confirmLogout:hover {
    background-color: #e17055;
}

#cancelLogout {
    background-color: #b2bec3;
    margin-left: 10px;
}

#cancelLogout:hover {
    background-color: #636e72;
}

/* Previous Button Styling with Icon */
#previousButton {
    position: absolute;
    top: 20px;
    left: 270px;
    font-size: 1.5rem; /* Increased for better visibility */
    padding: 10px;
    background-color: #e74c3c;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
}

#previousButton:hover {
    background-color: #c0392b;
}

#previousButton i {
    margin: 0;
    font-size: 1.3rem;
}
  </style>
</head>
<body>
  <!-- Sidebar will be injected here -->
  <div id="sidebar-placeholder"></div>

    <main>
        <h1>Check Attendance (Grade)</h1>
    </main>

    <div class="main-content">

    <!-- Previous Button with an icon -->
    <button id="previousButton" onclick="goBack()">
            <i class="fas fa-arrow-left"></i>
    </button>

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