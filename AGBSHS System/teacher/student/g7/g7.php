<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Attendance</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;600&display=swap');

* {
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style-type: none;
    box-sizing: border-box;
    font-family: 'Merriweather', sans-serif;
}

body {
    background-color: black;
}

main {
    margin-top: 30px;
    color: white;
    border-bottom: 1px solid #d2b48c;
}

main h1 {
    margin-left: 185px;
    margin-bottom: 30px;
    font-size: 25px;
}

#menu-toggle {
    display: none;
}

.sidebar {
    position: fixed;
    height: 100%;
    width: 165px;
    left: 0;
    bottom: 0;
    top: 0;
    z-index: 100;
    background: black;
    transition: left 300ms;
}

.side-header {
    box-shadow: 0px 5px 5px -5px rgb(0 0 0 /10%);
    background: #d2b48c;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.side-header h3, side-head span {
    color: black;
    font-weight: 400;
}

.side-content {
    height: calc(100vh - 60px);
    overflow: auto;
    border-right: 1px solid #d2b48c;
}

/* width */
.side-content::-webkit-scrollbar {
  width: 5px;
}

/* Track */
.side-content::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
.side-content::-webkit-scrollbar-thumb {
  background: #b0b0b0; 
  border-radius: 10px;
}

/* Handle on hover */
.side-content::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}

.profile {
    text-align: center;
    padding: 2rem 0rem;
}

.bg-img {
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 50%;
    background-size: cover;
}

.profile-img {
    height: 80px;
    width: 80px;
    display: inline-block;
    margin: 0 auto .5rem auto;
    border: 3px solid #d2b48c;
}

.profile h4 {
    color: #d2b48c;
    font-weight: 500;
}

.profile small {
    color: #d2b48c;
    font-weight: 600;
}

.sidebar {
    overflow-y: auto;
}

.side-menu ul {
    text-align: center;
}

.side-menu a {
    display: block;
    padding: 1.2rem 0rem;
}

.side-menu a.active {
    background: #d2b48c;
}

.side-menu a.active span, .side-menu a.active small {
    color: black;
}

.side-menu a span {
    display: block;
    text-align: center;
    font-size: 1.7rem;
}

.side-menu a span, .side-menu a small {
    color: #d2b48c;
}

#menu-toggle:checked ~ .sidebar {
    width: 60px;
}

#menu-toggle:checked ~ .sidebar .side-header span {
    display: none;
}

.main-content {
    margin-top: 0px;
    margin-left: 400px;
    margin-right: 300px;
    background-color: black;
    padding: 100px;
    border-color: black;
    color: #d2b48c;
}

.main-content h1{
    font-size: 25px;
}

button {
  width: 100%;
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
    color: black;
    background-color: #d2b48c;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.flex-container {
  display: flex;
  justify-content: center;
  background-color: black;
}

.flex-container > div {
  background-color: black;
  width: 200px;
  margin: 50px;
  padding: 50px;
  text-align: center;
  line-height: 50px;
  font-size: 20px;
  border: 1px solid #d2b48c;
}

.flex-container div a {
    color: white;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  padding-left: 50px;
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: black;
  color: white;
}

.modal-body {
    padding: 2px 16px;
    margin-top: 0px;
    background-color: black;
    padding: 100px;
    border-color: black;
    color: #d2b48c;
}

.modal-footer {
  padding: 2px 16px;
  background-color: black;
  color: white;
}
</style>
</head>

<body>
    <input type="checkbox" id="menu-toggle">
        <div class="sidebar">
            <div class="side-header">
                <h3>Teacher</h3>
            </div>
        
            <div class="side-content">
                <div class="profile">
                    <div class="profile-img bg-img" style="background-image: url(img/3.jpeg)"></div>
                        <h4>Mr. Wick</h4>
                    <small>Adviser</small>
                </div>

                <div class="side-menu">
                    <ul>
                        <li>
                            <a href="javascript:void(0)" onclick="openPage('dashboard')">
                                <span class="las la-home"></span>
                                <small>Dashboard</small>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="active" onclick="openPage('student/student.php')">
                                <span class="las la-user-alt"></span>
                                <small>Student</small>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="openPage('attendance/attendance.php')">
                                <span class="las la-tasks"></span>
                                <small>Attendance</small>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="openPage('report/report.php')">
                                <span class="las la-clipboard-list"></span>
                                <small>Report</small>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="logOut()">
                                <span class="las la-sign-out-alt"></span>
                                <small>Log out</small>
                            </a>
                        </li>
                    </ul>
                </div>

                <script>
                    function openPage(pageUrl) {
                        // Resolve the absolute path based on the current location
                        const baseUrl = window.location.origin + window.location.pathname;
                        const newPageUrl = new URL(pageUrl, baseUrl);
                        window.location.href = newPageUrl.href;
                    }

                    function logOut() {
                        alert("Logging out...");
                        window.location.href = 'logout.php';
                    }
                </script>

            </div>
        </div>

        <main>
            <h1>Antonino G. Busano Sr. High School Attendance Monitoring System</h1>
        </main>

        <div class="main-content">
            
        <button id="previousButton" onclick="goBack()">Previous</button>

        <script>
            function goBack() {
                window.history.back();
            }
        </script>   

            <div class="flex-container">
                <div><a href="s1.php">Section 1</a></div>
                <div><a href="">Section 2</a></div>
                <div><a href="">Section 3</a></div>
                <div><a href="">Section 4</a></div>
            </div>
        </div>

    </body>
</html>