<?php 
session_start();

// log in
	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

  <style>
    /* General Styles */
body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fc;
}

    .main-content {
    margin-left: 250px;
    padding: 20px;
    background-color: #f4f7fc;
    height: 100vh;
    overflow: auto;
}

/* Dashboard Content */
main {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.page-header h1 {
    font-size: 28px;
    color: #2d3436;
}

.page-header small {
    color: #b2bec3;
}

.page-content {
    margin-top: 20px;
}

.analytics {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    position: relative;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.card .card-head h2 {
    margin: 0;
    font-size: 36px;
    color: #2d3436;
}

.card .card-head span {
    font-size: 30px;
    color: #0984e3;
    position: absolute;
    top: 20px;
    right: 20px;
}

.card-progress {
    margin-top: 15px;
}

.card-progress small {
    color: #b2bec3;
    font-size: 14px;
}

.card-indicator {
    width: 100%;
    background-color: #ecf0f1;
    height: 6px;
    border-radius: 10px;
    margin-top: 5px;
    position: relative;
}

.card-indicator .indicator {
    height: 100%;
    border-radius: 10px;
}

.indicator.one {
    background-color: #74b9ff;
}

.indicator.two {
    background-color: #fdcb6e;
}

.indicator.three {
    background-color: #00b894;
}

.indicator.four {
    background-color: #d63031;
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

/* Media Queries */
@media screen and (max-width: 1200px) {
    .analytics {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media screen and (max-width: 768px) {
    .analytics {
        grid-template-columns: 1fr;
    }

    .sidebar {
        width: 200px;
    }

    .main-content {
        margin-left: 200px;
    }
}

@media screen and (max-width: 576px) {
    .sidebar {
        width: 180px;
    }

    .main-content {
        margin-left: 180px;
    }
}
  </style>
</head>
<body>
  <!-- Sidebar will be injected here -->
  <div id="sidebar-placeholder"></div>

  <div class="main-content">      
        <main>
            <h1>Antonino G. Busano Sr. High School Attendance Monitoring System</h1>
            
            <div class="page-header">
                <h3>Welcome back Teacher!</h3>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">
            
                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <h2>254</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Grade 7</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 50%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>236</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Grade 8</small>
                            <div class="card-indicator">
                                <div class="indicator two" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>289</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Grade 9</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 80%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <h2>221</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Grade 10</small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 20%"></div>
                            </div>
                        </div>
                    </div>

                </div>
            
            </div>
            
        </main>
        
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