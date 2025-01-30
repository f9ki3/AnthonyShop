<?php
session_start(); // Start the session

// Check if user is logged in by checking if 'user_id' is set in the session
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    if (!isset($_SESSION['role'])) {
        // If not logged in, redirect to login page
        header("Location: ../admin/dashboard.php");
        exit(); // Terminate further execution
    }else{
         // If not logged in, redirect to login page
         header("Location: ../login.php");
         exit(); // Terminate further execution
    }
}

// If user is logged in, continue with the current page content
?>
