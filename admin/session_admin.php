<?php
session_start(); // Start the session

// Check if user is logged in and if their role is 'admin'
if (!isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    // If not logged in or not an admin, redirect to login page
    header("Location: index.php");
    exit(); // Terminate further execution
}

?>
