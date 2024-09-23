<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <style>
        body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f7fc;
}

        /* Main content and header */
main {
    text-align: center;
    margin-top: 20px;
    font-family: 'Arial', sans-serif;
    color: #333;
}

h1 {
    font-size: 2.2rem;
    color: #2c3e50;
}

/* Main content styling */
.main-content {
    text-align: center;
    margin-top: 20px;
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

/* Button Styling */
button {
    font-size: 1rem;
    padding: 12px 20px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #2980b9;
}

/* Cool Box Button */
.cool-box-button {
    position: absolute;
    top: 20px;
    right: 20px;
    background-color: #27ae60;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    transition: background-color 0.3s;
}

.cool-box-button:hover {
    background-color: #2ecc71;
}

.cool-box-button i {
    font-size: 1.3rem;
}

/* Modal Styling */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    transition: opacity 0.5s ease;
}

.modal-content {
    background-color: white;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
    animation: modalOpen 0.3s;
}

@keyframes modalOpen {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eee;
}

.modal-header h2 {
    font-size: 1.5rem;
    color: #34495e;
}

.modal-body {
    padding-top: 20px;
}

label {
    font-size: 1.1rem;
    color: #34495e;
}

input[type="text"] {
    width: 90%;
    padding: 10px;
    margin-top: 8px;
    margin-bottom: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 1rem;
}

.modal-footer {
    padding-top: 10px;
    text-align: center;
    border-top: 1px solid #eee;
    color: #34495e;
}

.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover, .close:focus {
    color: #555;
}

button:focus {
    outline: none;
}
    </style>
</head>
<body>
    <!-- Sidebar will be injected here -->
    <div id="sidebar-placeholder"></div>

        <main>
            <h1>Student</h1>
            <h1>Grade 7 Section 1</h1>
        </main>

        <div class="main-content">
        
        <!-- Previous Button with an icon -->
        <button id="previousButton" onclick="goBack()">
            <i class="fas fa-arrow-left"></i>
        </button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
        
            <!-- Trigger/Open The Modal -->
            <button id="myBtn" class="cool-box-button" onclick="addStudent()">
                <i class="fas fa-user-graduate"></i>
            </button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Add Student</h2>
        </div>
    <div class="modal-body">
            <form action="process-form.php" method="post">

                    <!-- student id -->
                    <label for="stud_id">Student ID:</label>
                    <input type="text" id="stud_id" name="stud_id">
                    <br><br>
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
                        <br><br><br>
                <!-- confirm -->
                <button>Confirm</button>    
            </form>
    </div>
    <div class="modal-footer">
      <h3>Add Student</h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

          
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