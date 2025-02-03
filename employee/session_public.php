<?php
// Start the session
session_start();

// Check if the user is already logged in and has the 'admin' role
if (isset($_SESSION['role']) && $_SESSION['role'] === 'employee') {
    // If the user is an admin, redirect to the dashboard
    header("Location: orders.php");
    exit(); // Terminate further execution
}if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // If the user is an admin, redirect to the dashboard
    header("Location: ../admin/");
    exit(); // Terminate further execution
}

// If the user is not an admin, you can either show a message or stay on the current page
// You can add additional code here for non-admin users
?>
