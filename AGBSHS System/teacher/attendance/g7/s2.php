<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .attendance-form {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 600px;
            margin: auto;
        }
        .attendance-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            align-items: center;
        }
        .attendance-row label {
            flex: 1;
        }
        .attendance-row input[type="text"] {
            flex: 2;
            margin-right: 10px;
        }
        .attendance-row .attendance-check {
            flex: 1;
            display: flex;
            justify-content: space-evenly;
        }
        .attendance-check label {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Student Attendance</h1>
    <form class="attendance-form" action="#" method="post">
        <div class="attendance-row">
            <label for="student-id-1">Student ID:</label>
            <input type="text" id="student-id-1" name="student-id-1">
            <label for="student-name-1">Name:</label>
            <input type="text" id="student-name-1" name="student-name-1">
            <div class="attendance-check">
                <label for="present-1">Present</label>
                <input type="checkbox" id="present-1" name="attendance-1" value="present">
                <label for="absent-1">Absent</label>
                <input type="checkbox" id="absent-1" name="attendance-1" value="absent">
            </div>
        </div>
        <!-- Repeat the above block for each student -->
        <div class="attendance-row">
            <label for="student-id-2">Student ID:</label>
            <input type="text" id="student-id-2" name="student-id-2">
            <label for="student-name-2">Name:</label>
            <input type="text" id="student-name-2" name="student-name-2">
            <div class="attendance-check">
                <label for="present-2">Present</label>
                <input type="checkbox" id="present-2" name="attendance-2" value="present">
                <label for="absent-2">Absent</label>
                <input type="checkbox" id="absent-2" name="attendance-2" value="absent">
            </div>
        </div>
        <!-- Add as many student rows as needed -->
        <button type="submit">Submit Attendance</button>
    </form>
</body>
</html>
