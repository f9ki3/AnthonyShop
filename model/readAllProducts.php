<?php 
include 'connection.php';

// Ensure JSON is treated as such
header('Content-Type: application/json');

// Query to fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$response = [];

if ($result->num_rows > 0) {
    // Fetch all rows and store in the response array
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
    // Return success response with data
    echo json_encode(["status" => "success", "data" => $response]);
} else {
    // Return response for no data found
    echo json_encode(["status" => "success", "data" => [], "message" => "No products found."]);
}

// Close the connection
$conn->close();
?>