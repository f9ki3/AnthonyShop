<?php
include 'connection.php';

// Set JSON response header
header('Content-Type: application/json');

// Get parameters
$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 6; // Number of items per page
$offset = ($page - 1) * $limit;

$response = [];

// Prepare SQL query based on search term
if ($searchTerm !== '') {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? LIMIT ? OFFSET ?");
    $likeTerm = '%' . $searchTerm . '%';
    $stmt->bind_param('sii', $likeTerm, $limit, $offset);
} else {
    // Add ORDER BY to arrange in DESC order when no search term
    $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT ? OFFSET ?");
    $stmt->bind_param('ii', $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }
}

// Get total number of records for pagination
if ($searchTerm !== '') {
    $countStmt = $conn->prepare("SELECT COUNT(*) AS total FROM products WHERE name LIKE ?");
    $countStmt->bind_param('s', $likeTerm);
} else {
    $countStmt = $conn->prepare("SELECT COUNT(*) AS total FROM products");
}

$countStmt->execute();
$countResult = $countStmt->get_result();
$totalRecords = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRecords / $limit);

// Return JSON response
echo json_encode([
    "status" => "success",
    "data" => $response,
    "pagination" => [
        "current_page" => $page,
        "total_pages" => $totalPages,
        "total_records" => $totalRecords
    ]
]);

// Close statements and connection
$stmt->close();
$countStmt->close();
$conn->close();
?>
