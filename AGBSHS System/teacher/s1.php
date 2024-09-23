<?php 
session_start();

$servername = "localhost"; // Change if your MySQL server is on a different host
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$dbname = "agbshs_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT stud_id, fname, mname, lname FROM student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Attendance | G7S1</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fc;
}

    /* Main content styling */
main {
    margin-left: 350px; /* Sidebar width + some extra spacing */
    padding: 20px;
    background-color: #f0f3f5;
    color: #2d3436;
    font-family: 'Roboto', sans-serif;
    transition: all 0.3s ease;
}

main h1 {
    font-size: 28px;
    font-weight: 700;
    color: #0984e3;
    margin-bottom: 20px;
}

.main-content {
    margin-left: 270px;
    padding: 20px;
    background-color: #ffffff;
    min-height: 100vh;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

/* Button Styling */
button {
    background-color: #0984e3;
    color: white;
    border: none;
    padding: 12px 24px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 8px;
    margin: 10px 0;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

button:hover {
    background-color: #74b9ff;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

button a {
    color: white;
    text-decoration: none;
}

button a:hover {
    text-decoration: underline;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    overflow: hidden;
}

table th, table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #0984e3;
    color: white;
    font-weight: bold;
}

table tr:hover {
    background-color: #f1f2f6;
}

table tr:last-child td {
    border-bottom: none;
}

/* Date and Time styling */
.datetime-container {
    margin-bottom: 20px;
}

#datetime {
    font-size: 18px;
    font-weight: 500;
    color: #636e72;
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
            <h1>Antonino G. Busano Sr. High School Attendance Monitoring System</h1>
        </main>

        <div class="main-content">

        <div class="datetime-container">
        <p id="datetime"></p>
    </div>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = {
                weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
                hour: '2-digit', minute: '2-digit', second: '2-digit'
            };
            document.getElementById('datetime').textContent = now.toLocaleDateString('en-US', options);
        }

        setInterval(updateDateTime, 1000); // Update every second
        updateDateTime(); // Initial call to display immediately
    </script>

<!-- Previous Button with an icon -->
<button id="previousButton" onclick="goBack()">
            <i class="fas fa-arrow-left"></i>
</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>

        <button><a href="viewatt.php">View Attendance</a></button>

            <?php
                // Display the notification message
                if (isset($_SESSION['message'])) {
                    echo "<div style='color: white; font-weight: bold;'>" . $_SESSION['message'] . "</div>";
                    unset($_SESSION['message']); // Unset the message after displaying it
                }
            ?>

            <form method="post" action="save_attendance.php">
                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Present</th>
                        <th>Absent</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . $row["stud_id"]. "</td>
                                <td>" . $row["fname"]. "</td>
                                <td>" . $row["mname"]. "</td>
                                <td>" . $row["lname"]. "</td>
                                <td><input type='checkbox' name='attendance[" . $row["stud_id"] . "]' value='present'></td>
                                <td><input type='checkbox' name='attendance[" . $row["stud_id"] . "]' value='absent'></td>
                                </tr>";
                            }
                    } else {
                        echo "<tr><td colspan='6'>0 results</td></tr>";
                    }
                    $conn->close();
                    ?>
                </table>
                <button>Save</button>
            </form>

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