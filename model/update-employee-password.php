<?php
session_start();
include 'connection.php'; // Include the database connection file

// Get the admin ID from the session
$admin_id = $_SESSION['user_id'];

// Check if POST data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new password (employee password), admin password, and employee ID from the AJAX request
    $newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : '';
    $adminPassword = isset($_POST['adminPassword']) ? $_POST['adminPassword'] : '';
    $employeeId = isset($_POST['employeeId']) ? $_POST['employeeId'] : '';

    // Validate inputs
    if (empty($newPassword) || empty($adminPassword) || empty($employeeId)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Prepare the query to get the admin's password
    $stmt = $conn->prepare("SELECT password FROM admin WHERE id = ?");
    $stmt->bind_param("i", $admin_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verify the admin password
    if ($result->num_rows === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Admin not found.']);
        exit;
    }

    $adminData = $result->fetch_assoc();

    if (!password_verify($adminPassword, $adminData['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect admin password.']);
        exit;
    }

    // Hash the new employee password before updating it in the database
    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the employee password in the database
    $updateStmt = $conn->prepare("UPDATE admin SET password = ? WHERE id = ?");
    $updateStmt->bind_param("si", $hashedNewPassword, $employeeId);

    if ($updateStmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Employee password changed successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update the employee password.']);
    }

    // Close the connection
    $stmt->close();
    $updateStmt->close();
    $conn->close();
    exit;
}

// If the request method is not POST, return an error
echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
?>
