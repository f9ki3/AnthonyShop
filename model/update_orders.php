<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $orderHash = isset($_POST['order_hash']) ? trim($_POST['order_hash']) : null;
    $status = isset($_POST['status']) ? trim($_POST['status']) : null;

    // Validate inputs
    if (empty($orderHash) || empty($status)) {
        echo json_encode(["success" => false, "message" => "Order hash and status are required"]);
        exit;
    }

    // Sanitize input to prevent SQL injection
    $orderHash = htmlspecialchars($orderHash, ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars($status, ENT_QUOTES, 'UTF-8');

    // Validate order status
    $validStatuses = ["pending", "canceled", "accepted", "delivery", "completed"];
    if (!in_array($status, $validStatuses)) {
        echo json_encode(["success" => false, "message" => "Invalid status value"]);
        exit;
    }

    // Check if the order exists
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM orders WHERE order_hash = ?");
    $checkStmt->bind_param("s", $orderHash);
    $checkStmt->execute();
    $checkStmt->bind_result($orderExists);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($orderExists == 0) {
        echo json_encode(["success" => false, "message" => "Order not found"]);
        exit;
    }

    // Update order status
    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE order_hash = ?");
    $stmt->bind_param("ss", $status, $orderHash);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Status updated successfully"]);
    } else {
        error_log("SQL Error: " . $stmt->error);  // Log the error for debugging purposes
        echo json_encode(["success" => false, "message" => "Database update failed"]);
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
    exit;
}
?>
