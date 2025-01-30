<?php
session_start(); // Ensure session is started

include 'connection.php';

// Set the limit per page
$limit = 5;

// Get the current page from the query string, default is page 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $limit;

// Fetch the total number of rows in the orders table
$total_query = "SELECT COUNT(*) AS total FROM orders";
$stmt = $conn->prepare($total_query);
$stmt->execute();
$total_result = $stmt->get_result();
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];

// Calculate the total number of pages
$total_pages = ceil($total_records / $limit);

// Fetch the necessary fields for the current page, excluding user_id
$query = "SELECT order_hash, firstname, lastname, contact, email, address, 
                 cart_items, payment_type, gcash_reference, subtotal, shipping_fee, total, status, order_date 
          FROM orders 
          ORDER BY order_date DESC 
          LIMIT $limit OFFSET $offset";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

// Prepare the JSON response
$response = [
    'current_page' => $page,
    'total_pages' => $total_pages,
    'total_records' => $total_records,
    'data' => []
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['data'][] = [
            'order_hash' => $row['order_hash'],
            'order_date' => $row['order_date'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'contact' => $row['contact'],
            'email' => $row['email'],
            'address' => $row['address'],
            'cart_items' => $row['cart_items'],
            'payment_type' => $row['payment_type'],
            'gcash_reference' => $row['gcash_reference'],
            'subtotal' => $row['subtotal'],
            'shipping_fee' => $row['shipping_fee'],
            'total' => $row['total'],
            'status' => $row['status']
        ];
    }
} else {
    $response['data'] = [];
    $response['message'] = "No records found.";
}

// Set the header to return JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
$conn->close();
?>
