<?php
// Database credentials
$host = "localhost";    // Host name (e.g., localhost)
$username = "root";     // MySQL username
$password = "";         // MySQL password
$dbname = "oosdb"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";

?>
