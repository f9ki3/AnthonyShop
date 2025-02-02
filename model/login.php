<?php 
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the existing session

session_start(); // Start a new session
include 'connection.php';

// Get the raw POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate and sanitize the email and password
$email = isset($data['email']) ? trim($data['email']) : '';
$password = isset($data['password']) ? trim($data['password']) : ''; // Don't hash the password here

// Sanitize the email to avoid potential security issues
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Check if email and password are provided
if (empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Email and password are required']);
    exit();
}

// Prepare SQL query to check if the email exists
$sql = "SELECT * FROM customer WHERE email = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database query preparation failed']);
    exit();
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if the email exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $user['password'])) { // Use raw password here
        // Store user data in session if password matches
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];
        $_SESSION['address'] = $user['address'];
        $_SESSION['contact'] = $user['contact'];
        $_SESSION['barangay'] = $user['barangay'];
        $_SESSION['province'] = $user['province'];
        $_SESSION['municipal'] = $user['municipal'];

        // Send success response
        echo json_encode(['success' => true, 'message' => 'Login successful']);
    } else {
        // Send failure response if password doesn't match
        echo json_encode(['success' => false, 'message' => 'Incorrect password']);
    }
} else {
    // Send failure response if email is not found
    echo json_encode(['success' => false, 'message' => 'Incorrect email']);
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
