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