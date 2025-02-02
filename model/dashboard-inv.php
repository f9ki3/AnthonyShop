<?php
session_start();
include 'connection.php';

$response = [
    "high_quantity" => [],
    "least_quantity" => []
];

// Get Top 5 Highest Quantity Products
$highQuery = "SELECT name, quantity FROM products ORDER BY quantity DESC LIMIT 5";
$highResult = mysqli_query($conn, $highQuery);

while ($row = mysqli_fetch_assoc($highResult)) {
    $response["high_quantity"][] = $row;
}

// Get Bottom 5 Lowest Quantity Products
$lowQuery = "SELECT name, quantity FROM products ORDER BY quantity ASC LIMIT 5";
$lowResult = mysqli_query($conn, $lowQuery);

while ($row = mysqli_fetch_assoc($lowResult)) {
    $response["least_quantity"][] = $row;
}

// Return JSON response
header("Content-Type: application/json");
echo json_encode($response);
?>
