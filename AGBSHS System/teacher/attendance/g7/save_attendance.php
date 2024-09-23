<?php
session_start();

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

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attendance = $_POST['attendance'];
    $success = true;

    foreach ($attendance as $stud_id => $status) {
        $status = $conn->real_escape_string($status);
    
        // Fetch the names from the database
        $result = $conn->query("SELECT fname, mname, lname FROM student WHERE stud_id='$stud_id'");
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
    
        // Save the attendance data to the database
        $sql = "INSERT INTO attendance (stud_id, fname, mname, lname, status) 
                VALUES ('$stud_id', '$fname', '$mname', '$lname', '$status') 
                ON DUPLICATE KEY UPDATE status='$status'";
    
        if ($conn->query($sql) !== TRUE) {
            $success = false;
            break;
        }
    }    

    if ($success) {
        $_SESSION['message'] = "Attendance recorded successfully.";
    } else {
        $_SESSION['message'] = "There was an error recording attendance.";
    }

    // Redirect back to the form page
    header("Location: s1.php"); // Replace 'form_page.php' with your form page's filename
    exit();
}

// Close connection
$conn->close();
?>