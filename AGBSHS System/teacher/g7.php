<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Grade 7</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fc;
}

    /* Main content styling */
main {
    margin-left: 250px; /* Push the main content to the right by the width of the sidebar */
    padding: 20px;
    background-color: #f1f2f6;
    min-height: 10vh;
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
            <h1>Check Attendance (Section)</h1>
        </main>

        <div class="main-content">
            
            <!-- Previous Button with an icon -->
        <button id="previousButton" onclick="goBack()">
            <i class="fas fa-arrow-left"></i>
        </button>

            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            <div class="flex-container">
                <div><a href="s1.php"><i class="fas fa-chalkboard-teacher"></i> Section 1</a></div>
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