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
    background: #6F4E37;
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
    color: #6F4E37;
    font-weight: 400;
}

.side-content {
    height: calc(100vh - 60px);
    overflow: auto;
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
    background-color: #6F4E37;
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
</style>
</head>

<body>
    <input type="checkbox" id="menu-toggle">
        <div class="sidebar">
            <div class="side-header">
                <h3>A<span>dmin</span></h3>
            </div>
        
            <div class="side-content">
                <div class="profile">
                    <div class="profile-img bg-img" style="background-image: url(img/3.jpeg)"></div>
                        <h4>Admin</h4>
                    <small>School Coordinator</small>
                </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="dashboard.php">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="teacher.php">
                            <span class="las la-user-alt"></span>
                            <small>Teacher</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-user-alt"></span>
                            <small>Student</small>
                        </a>
                    </li>
                    <li>
                       <a href="" class="active">
                            <span class="las la-tasks"></span>
                            <small>Attendance</small>
                        </a>
                    </li>
                    <li>
                       <a href="">
                            <span class="las la-tasks"></span>
                            <small>Absences</small>
                        </a>
                    </li>
                        <li>
                            <a href="">
                                <span class="las la-clipboard-list"></span>
                                <small>Report</small>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-content">
        
        <h2>Check Attendance</h2>
        <br><br><br><br><br>
    <form action="save_attendance.php" method="post">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br><br><br><br><br><br>
        
        <label>Alice</label>
        <select name="status[1]">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select><br><br><br>
        
        <label>Bob</label>
        <select name="status[2]">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select><br><br><br>
        
        <label>Charlie</label>
        <select name="status[3]">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select><br><br><br>
        <br><br>
        <button>Save Attendance</button>
    </form>

        </div>

    </body>
</html>