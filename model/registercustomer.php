<?php
include 'connection.php';

// Get the raw POST data
$data = json_decode(file_get_contents('php://input'), true);

// Check if the required fields are present
$requiredFields = ['firstname', 'lastname', 'email', 'contact', 'address', 'password'];
foreach ($requiredFields as $field) {
    if (!isset($data[$field])) {
        echo json_encode(['status' => 'error', 'message' => "Missing required field: $field"]);
        exit();
    }
}

// Sanitize and assign data to variables
$firstname = $conn->real_escape_string($data['firstname']);
$lastname = $conn->real_escape_string($data['lastname']);
$email = $conn->real_escape_string($data['email']);
$contact = $conn->real_escape_string($data['contact']);
$address = $conn->real_escape_string($data['address']);
$password = password_hash($data['password'], PASSWORD_DEFAULT); // Encrypt password

// Generate a random username (e.g., first letter of firstname + lastname + random number)
$randomUsername = strtolower(substr($firstname, 0, 1) . $lastname . rand(100, 999));

// Prepare the SQL query using a prepared statement
$sql = "INSERT INTO customer (fname, lname, username, email, contact, address, password) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['status' => 'error', 'message' => 'Error preparing the SQL query']);
    exit();
}

// Bind parameters to the prepared statement
$stmt->bind_param("sssssss", $firstname, $lastname, $randomUsername, $email, $contact, $address, $password);

// Execute the prepared statement
if ($stmt->execute()) {
    // Return success response if the insertion is successful
    echo json_encode(['status' => 'success', 'message' => 'Registration successful!']);
} else {
    // Return error response if the execution fails
    echo json_encode(['status' => 'error', 'message' => 'Error: ' . $stmt->error]);
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>
