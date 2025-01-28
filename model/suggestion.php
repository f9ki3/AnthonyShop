<?php
include 'connection.php';

// Ensure JSON is treated as such
header('Content-Type: application/json');

// Get the total number of products
$countResult = $conn->query("SELECT COUNT(*) AS total FROM products");
$countRow = $countResult->fetch_assoc();
$totalProducts = $countRow['total'];

// Generate a random offset
$randomOffset = rand(0, $totalProducts - 8);

// Query to fetch 8 random products starting from the random offset
$sql = "SELECT * FROM products LIMIT $randomOffset, 8";
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
