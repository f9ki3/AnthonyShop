<?php
// Start the session
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page (or any other page)
header("Location: index.php");
exit(); // Terminate further execution after redirect
?>
