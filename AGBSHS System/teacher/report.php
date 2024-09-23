<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agbshs_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch attendance data
$sql = "SELECT stud_id, fname, mname, lname, status, recorded_at FROM attendance";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #4CAF50;
        }

        .top-bar a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            background-color: #45a049;
            border-radius: 5px;
            cursor: pointer;
        }

        .title-container {
            flex-grow: 1;
            text-align: center;
            color: white;
        }

        table {
            width: 80%;
            margin: 20px auto;
            margin-left: 265px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        @media print {
            body {
                visibility: hidden;
            }

            table {
                visibility: visible;
                width: 100%;
            }

            button {
                display: none;
            }

            .top-bar {
                display: none;
            }
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
    </style>
</head>
<body>
    <!-- Sidebar will be injected here -->
    <div id="sidebar-placeholder"></div>

    <!-- Top Bar with Home Button and Centered Title -->
    <div class="top-bar">
        <a href="dashboard.php">Home</a>
        <div class="title-container">
            <h1>Attendance Records</h1>
        </div>
    </div>

    <table>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Status</th>
            <th>Recorded At</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Convert the recorded_at timestamp to a readable format
                $date = date("F j, Y, g:i A", strtotime($row["recorded_at"]));

                echo "<tr>
                    <td>" . $row["stud_id"] . "</td>
                    <td>" . $row["fname"] . "</td>
                    <td>" . $row["mname"] . "</td>
                    <td>" . $row["lname"] . "</td>
                    <td>" . $row["status"] . "</td>
                    <td>" . $date . "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <!-- Print Button -->
    <button onclick="window.print()">Print Attendance</button>

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