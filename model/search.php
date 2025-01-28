<?php
include 'connection.php';

// Ensure JSON is treated as such
header('Content-Type: application/json');

// Retrieve and sanitize the 'q' parameter from the URL
$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';

$response = [];

if ($searchTerm !== '') {
    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
    $likeTerm = '%' . $searchTerm . '%';
    $stmt->bind_param('s', $likeTerm);
    $stmt->execute();
    $result = $stmt->get_result();

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

    $stmt->close();
} else {
    // Return response for empty search term
    echo json_encode(["status" => "error", "message" => "Search term is missing."]);
}

// Close the connection
$conn->close();
?>
