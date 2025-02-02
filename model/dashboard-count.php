<?php
session_start();
include 'connection.php';

// Get today's date in YYYY-MM-DD format
$today = date('Y-m-d');

// Query to sum total sales and count total orders for today
$query = "SELECT SUM(total) AS todays_sales, COUNT(order_no) AS todays_order_count FROM orders WHERE DATE(order_date) = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Query to count total customers
$customerQuery = "SELECT COUNT(*) AS total_customers FROM customer";
$customerResult = $conn->query($customerQuery);
$customerRow = $customerResult->fetch_assoc();

// Query to count total products
$productQuery = "SELECT COUNT(*) AS total_products FROM products";
$productResult = $conn->query($productQuery);
$productRow = $productResult->fetch_assoc();

// Prepare response
$response = [
    "todays_sales" => $row['todays_sales'] ? $row['todays_sales'] : 0,
    "todays_order_count" => $row['todays_order_count'] ? $row['todays_order_count'] : 0,
    "total_customers" => $customerRow['total_customers'] ? $customerRow['total_customers'] : 0,
    "total_products" => $productRow['total_products'] ? $productRow['total_products'] : 0
];

header('Content-Type: application/json');
echo json_encode($response);
?>
