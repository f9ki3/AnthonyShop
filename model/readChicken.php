<?php 
include 'connection.php';

// Ensure JSON is treated as such
header('Content-Type: application/json');

// Default pagination values
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = isset($_GET['limit']) && is_numeric($_GET['limit']) ? (int)$_GET['limit'] : 10;

// Calculate offset
$offset = ($page - 1) * $items_per_page;

// Query to fetch products with pagination
$sql = "SELECT * FROM products WHERE category = 'Chicken' LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $items_per_page, $offset);
$stmt->execute();
$result = $stmt->get_result();

// Response array
$response = [];

if ($result->num_rows > 0) {
    // Fetch all rows and store in the response array
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }

    // Count total products for the category
    $count_sql = "SELECT COUNT(*) AS total FROM products WHERE category = 'Chicken'";
    $count_result = $conn->query($count_sql);
    $total_items = $count_result->fetch_assoc()['total'];

    // Return success response with data and pagination info
    echo json_encode([
        "status" => "success",
        "data" => $response,
        "pagination" => [
            "current_page" => $page,
            "items_per_page" => $items_per_page,
            "total_items" => $total_items,
            "total_pages" => ceil($total_items / $items_per_page)
        ]
    ]);
} else {
    // Return response for no data found
    echo json_encode(["status" => "success", "data" => [], "message" => "No products found."]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
