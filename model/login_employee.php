<?php 
session_start();
session_unset(); // Unset all session variables (clears previous session)

// Include the database connection
include 'connection.php';

// Get the raw POST data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate and sanitize input
$email = isset($data['email']) ? filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL) : '';
$password = isset($data['password']) ? trim($data['password']) : ''; // Don't hash it here

// Ensure both email and password are provided
if (empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Email and password are required']);
    exit();
}

// Prepare the SQL statement to select only employees
$sql = "SELECT * FROM admin WHERE email = ? AND role = 'employee'";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit();
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if the email exists and belongs to an employee
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verify the password
    if (password_verify($password, $user['password'])) {
        // Store user data in the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];
        $_SESSION['address'] = $user['address'];
        $_SESSION['contact'] = $user['contact'];
        $_SESSION['role'] = $user['role'];

        // Send a success response
        echo json_encode(['success' => true, 'message' => 'Login successful']);
    } else {
        // Incorrect password
        echo json_encode(['success' => false, 'message' => 'Incorrect password']);
    }
} else {
    // Email not found or not an employee
    echo json_encode(['success' => false, 'message' => 'Incorrect email or unauthorized access']);
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
