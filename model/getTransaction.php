<?php
// Include the database connection file
include 'connection.php';

// Check if the 'id' parameter is passed in the URL
if (isset($_GET['id'])) {
    // Retrieve the order_hash from the URL parameter
    $order_hash = $_GET['id'];

    // Prepare the SQL query to fetch transaction details using the order_hash
    $sql = "SELECT * FROM orders WHERE order_hash = ?";

    // Prepare the statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameter to the SQL query
        $stmt->bind_param("s", $order_hash);

        // Execute the query
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Check if the result contains data
        if ($result->num_rows > 0) {
            // Fetch the data as an associative array
            $order = $result->fetch_assoc();

            // Check if the cart is a JSON string and decode it
            if (isset($order['cart']) && is_string($order['cart'])) {
                // Decode the JSON string to an array
                $cart = json_decode($order['cart'], true);

                // Check if decoding was successful
                if (json_last_error() === JSON_ERROR_NONE) {
                    // Successfully decoded, assign it back to the order
                    $order['cart'] = $cart;
                } else {
                    // Handle JSON decode error, set cart as an empty array or error message
                    $order['cart'] = [];
                }
            }

            // Return the data as a JSON response
            echo json_encode([
                'status' => 'success',
                'data' => $order
            ]);
        } else {
            // Return a response if no order was found
            echo json_encode([
                'status' => 'error',
                'message' => 'No transaction found with the given ID.'
            ]);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Return an error if the SQL query could not be prepared
        echo json_encode([
            'status' => 'error',
            'message' => 'Database query failed.'
        ]);
    }

    // Close the database connection
    $conn->close();
} else {
    // Return an error if the 'id' parameter is not set
    echo json_encode([
        'status' => 'error',
        'message' => 'Missing order ID parameter.'
    ]);
}
?>
