<?php
// Start the session to access session variables
session_start();
// Include the connection file to the database
include 'connection.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the AJAX request
    $user_id = $_SESSION['user_id']; // Get the user ID from session
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    // Validate the data (basic validation)
    if (empty($fname) || empty($lname) || empty($contact) || empty($email) || empty($address)) {
        // Return an error if any field is empty
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Prepare the SQL update statement
    $sql = "UPDATE admin SET fname = ?, lname = ?, contact = ?, email = ?, address = ? WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param('sssssi', $fname, $lname, $contact, $email, $address, $user_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Update session data with the new values
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['contact'] = $contact;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;

            // Optionally, retrieve the updated username if needed
            $sql = "SELECT username FROM customer WHERE id = ?";
            if ($stmt2 = $conn->prepare($sql)) {
                $stmt2->bind_param('i', $user_id);
                $stmt2->execute();
                $stmt2->bind_result($username);
                $stmt2->fetch();
                $_SESSION['username'] = $username;
                $stmt2->close();
            }

            // Return success response in JSON format
            echo json_encode(['status' => 'success', 'message' => 'Profile updated successfully!']);
        } else {
            // Return error response if the update failed
            echo json_encode(['status' => 'error', 'message' => 'Failed to update profile.']);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Return error response if there was an issue with preparing the statement
        echo json_encode(['status' => 'error', 'message' => 'Database error.']);
    }

    // Close the database connection
    $conn->close();
} else {
    // If the request is not a POST request, return an error
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
