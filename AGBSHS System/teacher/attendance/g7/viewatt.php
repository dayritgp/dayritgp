<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive 30-Day Calendar</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: black;
}

.calendar-container {
    text-align: center;
    background-color: black;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 600px;
}

#month-year {
    font-size: 2em;
    margin-bottom: 20px;
    color: orange;
}

.calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 10px;
}

.day {
    padding: 10px;
    background-color: black;
    color: orange;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    border: none;
    outline: none;
    font-size: 1em;
}

.day:hover {
    background-color: white;
    color: black;
}

.current-day {
    background-color: orange;
    color: white;
    font-weight: bold;
}

.current-day:hover {
    background-color: white;
    color: black;
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
                            <a href="javascript:void(0)" onclick="openPage('student/student.php')">
                                <span class="las la-user-alt"></span>
                                <small>Student</small>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="active" onclick="openPage('attendance/attendance.php')">
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

        

    <div class="calendar-container">
        <h1 id="month-year"></h1>
        <div class="calendar" id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const calendarElement = document.getElementById('calendar');
    const monthYearElement = document.getElementById('month-year');

    function generateCalendar() {
        const now = new Date();
        const month = now.getMonth();
        const year = now.getFullYear();
        const today = now.getDate();

        // Update the month-year header
        const options = { month: 'long', year: 'numeric' };
        monthYearElement.textContent = now.toLocaleDateString(undefined, options);

        // Get the first day of the current month and total days in the month
        const firstDayOfMonth = new Date(year, month, 1).getDay();
        const lastDateOfMonth = new Date(year, month + 1, 0).getDate();

        // Calculate the number of days to display (minimum 30 days)
        const daysToDisplay = Math.max(lastDateOfMonth, 30);

        // Clear the previous calendar
        calendarElement.innerHTML = '';

        // Create placeholders for days of the week
        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        daysOfWeek.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.textContent = day;
            dayElement.className = 'day';
            calendarElement.appendChild(dayElement);
        });

        // Add empty slots for the days before the first day of the month
        for (let i = 0; i < firstDayOfMonth; i++) {
            const emptySlot = document.createElement('div');
            calendarElement.appendChild(emptySlot);
        }

        // Generate days of the month (up to 30 days or the end of the month)
        for (let day = 1; day <= daysToDisplay; day++) {
            const dayElement = document.createElement('button');
            dayElement.textContent = day;
            dayElement.className = 'day';
            if (day === today) {
                dayElement.classList.add('current-day');
            }

            // Add click event to open a new webpage
            dayElement.addEventListener('click', () => {
                const url = `https://example.com/day/${year}-${month + 1}-${day}`;
                window.open(url, '_blank');
            });

            calendarElement.appendChild(dayElement);
        }
    }

    // Generate the calendar when the page loads
    generateCalendar();
});
    </script>
</body>
</html>
