<?php

$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$user_name = $_POST["user_name"];
$pass_word = $_POST["pass_word"];
$cpass_word = $_POST["cpass_word"];
$grade = filter_input(INPUT_POST, "grade", FILTER_SANITIZE_STRING);
$section = filter_input(INPUT_POST, "section", FILTER_SANITIZE_STRING); 

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

$sql = "INSERT INTO teacher (fname , mname , lname , user_name , pass_word , cpass_word , grade , section)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssssss",
                       $fname,
                       $mname,
                       $lname,
                       $user_name,
                       $pass_word,
                       $cpass_word,
                       $grade,
                       $section);

mysqli_stmt_execute($stmt);

echo "Create Successfully!";