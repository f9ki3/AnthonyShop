<?php
// Start the session to access session variables
session_start();

// Include the connection file to the database
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User is not logged in']);
    exit();
}

// Get data from AJAX request
$data = json_decode(file_get_contents('php://input'), true);
$password = $data['password'];
$new_password = $data['new_password'];

// Get the user id from session
$user_id = $_SESSION['user_id'];

// Fetch the current password from the database
$sql = "SELECT password FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Check if the password matches
if (password_verify($password, $user['password'])) {
    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $update_sql = "UPDATE admin SET password = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $hashed_password, $user_id);
    $update_stmt->execute();

    // Check if the update was successful
    if ($update_stmt->affected_rows > 0) {
        echo json_encode(['success' => 'Password updated successfully']);
    } else {
        echo json_encode(['error' => 'Failed to update password']);
    }
} else {
    echo json_encode(['error' => 'Incorrect current password']);
}

?>
