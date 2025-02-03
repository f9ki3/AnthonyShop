<?php
session_start(); // Ensure session is started

include 'connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id']; // Get the product ID

    // Use the provided $conn connection for the delete operation
    $stmt = $conn->prepare("DELETE FROM admin WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" means the parameter is an integer

    // Execute the delete query
    if ($stmt->execute()) {
        echo 'success'; // Return success if deletion is successful
    } else {
        echo 'error'; // Return error if deletion fails
    }

    // Close the statement
    $stmt->close();
} else {
    echo 'error'; // Return error if ID is not passed or POST method isn't used
}

// Close the database connection
$conn->close();
?>
