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
        body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fc;
}

        /* Main Content Styling */
main {
    margin-left: 350px; /* To adjust for the fixed sidebar */
    padding: 20px;
    flex-grow: 1;
}

h1 {
    font-size: 36px;
    color: #34495e;
    margin-bottom: 20px;
}

/* Main Content Area Styling */
.main-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-left: 250px;
}

/* Flexbox Container for Sections */
.flex-container {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.flex-container div {
    background-color: #3498db;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

.flex-container div a {
    color: white;
    text-decoration: none;
    font-size: 18px;
}

.flex-container div:hover {
    background-color: #2980b9;
}

/* Button Styling */
#previousButton {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#previousButton:hover {
    background-color: #c0392b;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    main {
        margin-left: 0;
    }

    .flex-container {
        flex-direction: column;
    }

    .flex-container div {
        margin-bottom: 10px;
    }
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
            <h1>Grade 7 (Section)</h1>
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
                <div><a href="stud_g7s1.php">Section 1</a></div>
                <div><a href="">Section 2</a></div>
                <div><a href="">Section 3</a></div>
                <div><a href="">Section 4</a></div>
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