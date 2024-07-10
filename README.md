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
<img width="490" alt="html1" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/11fd189c-0344-41f0-9fee-9c72fdbb3758">
<img width="431" alt="html2" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/dd459110-b32c-4fee-92a0-6f22ba820b6b">


#### HTML Structure
  - The HTML file sets up the basic structure of the webpage, including the `head` section for metadata and `body` for content.
  - It includes buttons for each robot command and a script to handle button clicks.

### CSS
<img width="293" alt="css" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/c58155e9-b5d7-4c14-861a-6f38b6e8135b">


#### CSS Styling
  - Defines the styling for the page, including font, text alignment, and button styles.
  - Adds hover effects to buttons for better user experience.

<img width="932" alt="web page" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/5d81e94f-3815-4921-9446-58075cf5c697">


### PHP
<img width="623" alt="php1" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/26ffada4-b5b8-427a-90a6-eab5a0dfda20">
<img width="575" alt="php2" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/57f4de96-6db9-4499-b1cd-4791b379a6c2">


#### PHP Script
  - `send_command.php` handles the incoming POST request, checks the data, and inserts it into the `robot_control` database table.
  - Returns a JSON response indicating success or failure.

<img width="930" alt="sql data" src="https://github.com/EngJana/Web_week-2-task-1/assets/173661625/ecfa6b6a-3187-4462-a16a-8165f75977f6">


