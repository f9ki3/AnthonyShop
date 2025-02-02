<?php
include 'connection.php';

// Set JSON response header
header('Content-Type: application/json');

// Get parameters
$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$sortType = isset($_GET['sort_type']) ? trim($_GET['sort_type']) : 'id'; // Default sorting by ID
$sortOrder = isset($_GET['sort_order']) ? strtoupper(trim($_GET['sort_order'])) : 'DESC'; // Default sorting order is ASC
$limit = 6; // Number of items per page
$offset = ($page - 1) * $limit;

$response = [];

// Validate sort type
$allowedSortTypes = ['name', 'price', 'quantity'];
if (!in_array($sortType, $allowedSortTypes)) {
    $sortType = 'id'; // Default to sorting by ID if invalid type is given
}

// Validate sort order (ASC or DESC)
if ($sortOrder !== 'ASC' && $sortOrder !== 'DESC') {
    $sortOrder = 'DESC'; // Default to ascending order if invalid order is given
}

// Prepare SQL query based on search term
if ($searchTerm !== '') {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? ORDER BY $sortType $sortOrder LIMIT ? OFFSET ?");
    $likeTerm = '%' . $searchTerm . '%';
    $stmt->bind_param('sii', $likeTerm, $limit, $offset);
} else {
    $stmt = $conn->prepare("SELECT * FROM products ORDER BY $sortType $sortOrder LIMIT ? OFFSET ?");
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
    "sort_type" => $sortType,  // Include the sort type in the response
    "sort_order" => $sortOrder, // Include the sort order in the response
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
