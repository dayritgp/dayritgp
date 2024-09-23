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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    /* Basic Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f0f2f5;
    color: #333;
    line-height: 1.6;
}

main {
    background-color: #003366;
    color: #fff;
    text-align: center;
    padding: 20px;
    border-bottom: 4px solid #002244;
}

h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.main-content {
    padding: 20px;
    max-width: 900px;
    margin: 20px auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.datetime-container {
    text-align: center;
    margin-bottom: 20px;
    font-size: 1.2rem;
    color: #007bff;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    margin: 10px 5px;
    transition: background-color 0.3s, transform 0.3s;
}

button a {
    color: #fff;
    text-decoration: none;
}

button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-top: 20px;
}

thead {
    background-color: #007bff;
    color: #fff;
    border-radius: 10px 10px 0 0;
}

thead th {
    padding: 15px;
    text-align: left;
    font-size: 1rem;
    border-bottom: 2px solid #0056b3;
}

tbody tr {
    border-bottom: 1px solid #ddd;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #e9ecef;
}

tbody td {
    padding: 12px;
    text-align: left;
    font-size: 1rem;
}

input[type="checkbox"] {
    transform: scale(1.2);
    margin: 0;
}

form {
    margin-top: 20px;
    text-align: center;
}

form button {
    background-color: #28a745;
}

form button:hover {
    background-color: #218838;
}

.notification {
    background-color: #ffc107;
    color: #333;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
}
</style>
</head>

<body>
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

<button id="previousButton" onclick="goBack()">Previous</button>

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

    </body>
</html>