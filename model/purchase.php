<?php
include 'connection.php';
session_start(); // Start the session to access user_id

// Set the Content-Type header to application/json
header('Content-Type: application/json');

// Retrieve the raw POST data
$rawData = file_get_contents('php://input');

// Decode the JSON data into a PHP associative array
$data = json_decode($rawData, true);

// Check if json_decode() succeeded
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data received.']);
    exit;
}

// Access individual fields from the $data array
$fname = $data['fname'] ?? null;
$lname = $data['lname'] ?? null;
$contact = $data['contact'] ?? null;
$email = $data['email'] ?? null;
$address = $data['address'] ?? null;
$payment_method = $data['payment_method'] ?? null;
$reference = $data['reference'] ?? null;
$sub_total = $data['sub_total'] ?? null;
$shipping = $data['shipping'] ?? null;
$total = $data['total'] ?? null;
$cart = $data['cart'] ?? []; // Cart is expected as an array of items

// Generate a unique order hash
$order_hash = bin2hex(random_bytes(8));

// Get the user ID from the session
$user_id = $_SESSION['user_id'] ?? null;

// Validate required fields
if (!$user_id || !$fname || !$lname || !$contact || !$email || !$address || empty($cart) || !$payment_method || !$sub_total || !$shipping || !$total) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields.']);
    exit;
}

// Start a transaction to ensure consistency
$conn->begin_transaction();

try {
    // Insert the order into the orders table
    $stmt = $conn->prepare("
        INSERT INTO orders (
            order_hash, user_id, firstname, lastname, contact, email, address,
            cart_items, payment_type, gcash_reference, subtotal, shipping_fee, total, status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')
    ");

    $cart_json = json_encode($cart); // Encode cart items as JSON for storage
    $stmt->bind_param(
        'sissssssssdss',
        $order_hash,
        $user_id,
        $fname,
        $lname,
        $contact,
        $email,
        $address,
        $cart_json,
        $payment_method,
        $reference,
        $sub_total,
        $shipping,
        $total
    );

    if (!$stmt->execute()) {
        throw new Exception('Failed to insert order: ' . $stmt->error);
    }

    // Update the product quantities in the products table
    $update_stmt = $conn->prepare("
        UPDATE products 
        SET quantity = quantity - ? 
        WHERE id = ? AND quantity >= ?
    ");

    foreach ($cart as $item) {
        $product_id = $item['id'];
        $cart_quantity = $item['quantity'];

        // Bind parameters for the product update
        $update_stmt->bind_param('iii', $cart_quantity, $product_id, $cart_quantity);

        if (!$update_stmt->execute()) {
            throw new Exception('Failed to update product quantity for product ID ' . $product_id . ': ' . $update_stmt->error);
        }

        // Check if any rows were affected (to ensure stock wasn't negative)
        if ($update_stmt->affected_rows === 0) {
            throw new Exception('Insufficient stock for product ID ' . $product_id);
        }
    }

    // Commit the transaction
    $conn->commit();

    // Respond with success
    echo json_encode(['status' => 'success', 'message' => 'Order placed successfully.', 'order_hash' => $order_hash]);
} catch (Exception $e) {
    // Rollback the transaction on error
    $conn->rollback();

    // Respond with the error
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} finally {
    $stmt->close();
    if (isset($update_stmt)) {
        $update_stmt->close();
    }
    $conn->close();
}
?>
