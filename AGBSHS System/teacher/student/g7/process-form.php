<?php

$stud_id = $_POST["stud_id"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];

$host = "localhost";
$dbname = "agbshs_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host,
                       $username,
                       $password,
                       $dbname);
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           

$sql = "INSERT INTO student (stud_id , fname , mname , lname)
        VALUES (?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssss",
                       $stud_id,
                       $fname,
                       $mname,
                       $lname,
                       );

mysqli_stmt_execute($stmt);

echo "Create Successfully!";