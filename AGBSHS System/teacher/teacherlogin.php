<?php 

session_start();

	include("connection.php");
	include("functions.php");
  
    $error_message = "";  // Initialize an error message variable

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['pass_word'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from teacher where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass_word'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: dashboard.php");
						die;
					}
				}
			}
			
			// Show notification for wrong username or password
			echo "<script>showNotification('Wrong username or password!');</script>";
		}else
		{
			// Show notification for empty or invalid input
			echo "<script>showNotification('Wrong username or password!');</script>";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Log in</title>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css">

  <style>
	body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #6e45e2, #88d3ce);
    font-family: 'Arial', sans-serif;
    margin: 0;
}

.wrapper {
    width: 100%;
    max-width: 400px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    animation: fadeIn 1s ease-in-out;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.input-box {
    position: relative;
    margin-bottom: 20px;
}

.input-box input {
    width: 100%;
    padding: 10px 40px 10px 20px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.input-box i {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    color: #888;
}

.input-box input:focus {
    border-color: #6e45e2;
    outline: none;
}

.remember-forgot {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.remember-forgot label {
    font-size: 14px;
}

.remember-forgot a {
    font-size: 14px;
    color: #6e45e2;
    text-decoration: none;
    transition: color 0.3s ease;
}

.remember-forgot a:hover {
    color: #5a3ea7;
}

.btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background: #6e45e2;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn:hover {
    background: #5a3ea7;
    transform: scale(1.05);
}

.register-link {
    text-align: center;
}

.register-link p {
    font-size: 14px;
}

.register-link a {
    color: #6e45e2;
    text-decoration: none;
    transition: color 0.3s ease;
}

.register-link a:hover {
    color: #5a3ea7;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Notification Modal Styles */
.notification-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .notification-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .notification-box h2 {
            color: #e74c3c;
            margin: 0;
        }

        .notification-box p {
            color: #333;
        }

        .close-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-btn:hover {
            background-color: #c0392b;
        }
  </style>
</head>
<body>
<div class="wrapper">
        <form method="post">
            <h1>Teacher</h1>
            <div class="input-box">
                <input type="text" name="user_name" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="pass_word" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember Me</label>
                <a href="#">Forgot Password</a>
            </div>
            <button type="submit" class="btn">Log in</button>
            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>

    <!-- Notification Modal -->
    <div id="notificationModal" class="notification-modal">
        <div class="notification-box">
            <h2>Alert</h2>
            <p id="notificationMessage"></p>
            <button class="close-btn" onclick="closeNotification()">Close</button>
        </div>
    </div>

    <script>
        // Function to show the notification modal
        function showNotification(message) {
            document.getElementById('notificationMessage').innerText = message;
            document.getElementById('notificationModal').style.display = 'flex';
        }

        // Function to close the notification modal
        function closeNotification() {
            document.getElementById('notificationModal').style.display = 'none';
        }

        // Check if there's an error message and display the modal if present
        window.onload = function() {
            var errorMessage = "<?php echo $error_message; ?>";
            if (errorMessage) {
                showNotification(errorMessage);
            }
        }
    </script>
</body>
</html>