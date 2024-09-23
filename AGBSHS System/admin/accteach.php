<?php 
session_start();

	include("connection1.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Teacher</title>
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

#menu-toggle:checked ~ .main-content {
    margin-left: 60px;
    width: calc(100% - 60px);
}

#menu-toggle:checked ~ .main-content header {
    left: 60px;
}

#menu-toggle:checked ~ .sidebar .profile,
#menu-toggle:checked ~ .sidebar .side-menu a small {
    display: none;
}

#menu-toggle:checked ~ .sidebar .side-menu a span {
    font-size: 1.3rem;
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

header {
    position: fixed;
    right: 0;
    top: 0;
    left: 165px;
    z-index: 100;
    height: 60px;
    box-shadow: 0px 5px 5px -5px rgb(0 0 0 /10%);
    background: #fff;
    transition: left 300ms;
}

.header-content, .header-menu {
    display: flex;
    align-items: center;
}

.header-content {
    justify-content: space-between;
    padding: 0rem 1rem;
}

.header-content label:first-child span {
    font-size: 1.3rem;
}

.header-content label {
    cursor: pointer;
}

.header-menu {
    justify-content: flex-end;
    padding-top: .5rem;
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

#menu-toggle:checked ~ .sidebar {
        left: 0;
    }
    
    #menu-toggle:checked ~ .sidebar {
        width: 165px;
    }

    #menu-toggle:checked ~ .sidebar .side-header span {
        display: inline-block;
    }

    #menu-toggle:checked ~ .sidebar .profile,
    #menu-toggle:checked ~ .sidebar .side-menu a small {
        display: block;
    }

    #menu-toggle:checked ~ .sidebar .side-menu a span {
        font-size: 1.7rem;
    }
    
    #menu-toggle:checked ~ .main-content header {
        left: 0px;
    }
    
    table {
        width: 900px;
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
                       <a href="teacher.php" class="active">
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
                       <a href="attendance.php">
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

        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu">
                    <div class="user">
                        <div class="bg-img" style="background-image: url(img/1.jpeg)"></div>
                        <span class="las la-power-off"></span>
                        <span>Log out</span>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content">
            <h1>Create Account</h1>
            <br><br>
            <form action="process-form.php" method="post">
            
                    <!-- first name -->
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname">
                    <br><br>
                    <!-- middle name -->
                    <label for="mname">Middle Name:</label>
                    <input type="text" id="mname" name="mname">
                    <br><br>
                    <!-- last name -->
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname">
                    <br><br>
                    <!-- username -->
                    <label for="user_name">Username:</label>
                    <input type="text" id="user_name" name="user_name">
                    <br><br>
                    <!-- password -->
                    <label for="pass_word">Password:</label>
                    <input type="text" id="pass_word" name="pass_word">
                    <br><br>
                    <!-- confirm password -->
                    <label for="cpass_word">Confirm Password:</label>
                    <input type="text" id="cpass_word" name="cpass_word">
                    <br><br>
                    <!-- grade -->
                    <label class="grade" for="grade">Choose what grade</label>
                        <select id="grade" name="grade">
                            <option value="Grade 7" selected>Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                        </select>
                        <br><br><br>
                    <!-- section -->
                    <label class="section" for="section">Choose what section</label>
                        <select id="section" name="section">
                            <option value="Section 1" selected>Section 1</option>
                            <option value="Section 2">Section 2</option>
                            <option value="Section 3">Section 3</option>
                            <option value="Section 4">Section 4</option>
                        </select>
                        <br><br><br>
                <!-- confirm -->
                <button>Confirm</button>    

            </form>
        </div>

    </body>
</html>