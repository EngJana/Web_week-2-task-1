# Web_week-2-task-1
week 2 in smart methods internship - web desapline 

This project provides a web interface to control a robot's movements. Users can send directional commands (Forward, Left, Right, Backward, Stop) to the robot, and the commands are stored in a MySQL database.

## Project Overview
The project consists of an HTML page with buttons to control the robot. When a button is pressed, a command is sent to a PHP script that stores the command in a MySQL database.

## Setup Instructions

1.	Set up the MySQL database:
Create database - robot_control 
-	id INT AUTO_INCREMENT PRIMARY KEY
-	direction VARCHAR(255) NOT NULL
-	timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
2.	Configure the code scripts:
-	HTML
-	CSS
-	PHP
3.	Run a local server:
    - Use a local server environment like XAMPP
    - Place the project files in the server's root directory.
4.	Open the HTML file in a browser:
    - Navigate to `http://localhost/robot-control/index.html`.

## Code Explanation

### HTML

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Robot Control</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Control Your Robot</h1>
    <div class="controls">
        <button onclick="sendCommand('forward')">Forward</button>
        <button onclick="sendCommand('left')">Left</button>
        <button onclick="sendCommand('right')">Right</button>
        <button onclick="sendCommand('backward')">Backward</button>
        <button onclick="sendCommand('stop')">Stop</button>
    </div>

    <script>
        function sendCommand(command) {
            const data = { direction: command };
            const jsonData = JSON.stringify(data);

            fetch('send_command.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: jsonData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Command sent successfully!');
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch((error) => {
                alert('Error sending command: ' + error.message);
            });
        }
    </script>
</body>
</html>

#### HTML Structure
  - The HTML file sets up the basic structure of the webpage, including the `head` section for metadata and `body` for content.
  - It includes buttons for each robot command and a script to handle button clicks.

### CSS

body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin-top: 50px;
}

h1 {
    font-size: 2em;
    margin-bottom: 20px;
}

.controls {
    display: flex;
    justify-content: center;
    gap: 10px;
}

button {
    padding: 10px 20px;
    font-size: 1em;
    cursor: pointer;
    border: none;
    background-color: #007BFF;
    color: white;
    border-radius: 5px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

#### CSS Styling
  - Defines the styling for the page, including font, text alignment, and button styles.
  - Adds hover effects to buttons for better user experience.

<img width="932" alt="web page" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/5d81e94f-3815-4921-9446-58075cf5c697">


### PHP

<?php
// Set the content type to application/json
header('Content-Type: application/json');

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot_control";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Get the data from the POST request
$data = json_decode(file_get_contents('php://input'), true);

// Check if the 'direction' field is set
if (!isset($data['direction'])) {
    echo json_encode(["status" => "error", "message" => "Missing 'direction' field"]);
    exit();
}

$direction = $data['direction'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO robot_control (direction, timestamp) VALUES (?, NOW())");
$stmt->bind_param("s", $direction);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Command '$direction' received"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
}

// Close the connection
$stmt->close();
$conn->close();
?>

#### PHP Script
  - `send_command.php` handles the incoming POST request, checks the data, and inserts it into the `robot_control` database table.
  - Returns a JSON response indicating success or failure.

<img width="930" alt="sql data" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/ecfa6b6a-3187-4462-a16a-8165f75977f6">


