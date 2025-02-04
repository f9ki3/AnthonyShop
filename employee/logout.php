<?php
// Start the session
session_start();

// Include the database connection
include '../model/connection.php';

// Get user information from the session
$user_id = $_SESSION['user_id'];
$user_agent = $_SESSION['fname'] . ' ' . $_SESSION['lname'];
$action = "Employee logged out";  // Action description for logout

// Log the logout action in audit_logs
$logStmt = $conn->prepare("INSERT INTO audit_logs (user_id, action, user_agent) VALUES (?, ?, ?)");
$logStmt->bind_param("iss", $user_id, $action, $user_agent);
$logStmt->execute();
$logStmt->close();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page (or any other page)
header("Location: index.php");
exit(); // Terminate further execution after redirect
?>
