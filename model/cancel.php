<?php 
include 'connection.php';

// Get the order_hash from the URL parameter
if (isset($_GET['id'])) {
    $order_hash = $_GET['id'];  // Retrieve the order_hash from the URL parameter

    // Prepare and execute the UPDATE query
    $query = "UPDATE orders SET status = 'canceled' WHERE order_hash = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('s', $order_hash);  // 's' is for string (order_hash)
        
        if ($stmt->execute()) {
            // After successful update, redirect to the orders page (or another page)
            header('Location: ../customer/my_order.php'); // Replace 'orders.php' with the appropriate page
            exit;  // Always call exit after header() to ensure no further code is executed
        } else {
            echo "Error updating order status.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the query.";
    }
} else {
    echo "No order hash provided.";
}

// Close the database connection
$conn->close();
?>
