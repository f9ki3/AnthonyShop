<?php 
include 'connection.php';

// Ensure JSON is treated as such
header('Content-Type: application/json');

// Get the 'id' parameter from the URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// If no 'id' parameter is provided, return an error message
if ($id === null) {
    echo json_encode(["status" => "error", "message" => "ID parameter is missing."]);
    exit;
}

// Prepare and bind the query to prevent SQL injection
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // 'i' means the parameter is an integer

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();
$response = [];

if ($result->num_rows > 0) {
    // Fetch the row and store in the response array
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    // Return success response with data
    echo json_encode(["status" => "success", "data" => $response]);
} else {
    // Return response for no data found
    echo json_encode(["status" => "success", "data" => [], "message" => "No products found."]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
