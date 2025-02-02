<?php
session_start(); // Ensure session is started

include 'connection.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Use default hashing algorithm
    $role = 'employee';
    $created_at = date('Y-m-d H:i:s'); // Current timestamp

    // Generate a base username: first letter of first name + last name
    $base_username = strtolower(substr($fname, 0, 1) . $lname);
    $username = $base_username;

    // Check if username already exists and make it unique
    $counter = 1;
    while (true) {
        $check_query = "SELECT id FROM admin WHERE username = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows === 0) {
            $stmt->close();
            break; // Username is unique, exit loop
        } else {
            $username = $base_username . $counter; // Append a number
            $counter++;
        }
        $stmt->close();
    }

    // Prepare SQL statement
    $sql = "INSERT INTO admin (fname, lname, username, email, contact, address, password, role, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssssssss", $fname, $lname, $username, $email, $contact, $address, $password, $role, $created_at);
        if ($stmt->execute()) {
            echo "User registered successfully! Username: " . $username;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error in preparing the statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
