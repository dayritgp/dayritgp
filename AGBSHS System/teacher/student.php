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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General page styling */
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fc;
}

/* Main section styling */
main {
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    text-align: center;
    border-bottom: 5px solid #388E3C;
    margin-left: 350px;
    margin-bottom: 20px;
    border-radius: 10px;
}

main h1 {
    margin: 0;
    font-size: 2.5rem;
    letter-spacing: 1.5px;
}

/* Main content styling */
.main-content {
    margin-left: 250px;
    padding: 20px;
    background-color: #f4f7fc;
    height: 100vh;
    overflow: auto;
}

/* Flex container for the grade links */
.flex-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-top: 20px;
}

.flex-container div {
    background-color: #4CAF50;
    padding: 20px;
    border-radius: 8px;
    transition: transform 0.3s, background-color 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.flex-container div:hover {
    transform: scale(1.05);
    background-color: #388E3C;
}

.flex-container a {
    text-decoration: none;
    color: white;
    font-size: 1.2rem;
    font-weight: bold;
}

.flex-container a i {
    margin-right: 10px;
}

/* Previous button styling */
#previousButton {
    background-color: #FF5722;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#previousButton:hover {
    background-color: #E64A19;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .flex-container {
        flex-direction: column;
        align-items: center;
    }

    .flex-container div {
        width: 100%;
        margin-bottom: 10px;
    }

    main h1 {
        font-size: 2rem;
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
            <h1>Student (Grade)</h1>
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
                <div><a href="stud_g7.php"><i class="fas fa-school"></i> Grade 7</a></div>
                <div><a href=""><i class="fas fa-chalkboard-teacher"></i> Grade 8</a></div>
                <div><a href=""><i class="fas fa-book"></i> Grade 9</a></div>
                <div><a href=""><i class="fas fa-graduation-cap"></i> Grade 10</a></div>
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