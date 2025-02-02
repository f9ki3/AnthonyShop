<?php
session_start(); // Ensure session is started

// Include the connection file
include 'connection.php';  // Assuming 'connection.php' contains the $conn variable

// Check if the form data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the posted product details
    $productID = $_POST['productID'] ?? '';
    $productName = $_POST['productName'] ?? '';
    $productDescription = $_POST['productDescription'] ?? '';
    $productPrice = $_POST['productPrice'] ?? '';
    $productQuantity = $_POST['productQuantity'] ?? '';
    $productCategory = $_POST['productCategory'] ?? '';

    // Initialize image upload variable
    $uploadedImage = '';

    // Handle image upload (if provided)
    if (isset($_FILES['productImgUpload']) && $_FILES['productImgUpload']['error'] === 0) {
        $targetDir = '../static/img/'; // Folder to store images
        $imageFileName = basename($_FILES['productImgUpload']['name']); // Retain original filename
        $targetFile = $targetDir . $imageFileName; // Path where the image will be saved
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Get file extension

        // Validate image file type
        $validImageTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $validImageTypes)) {
            if (move_uploaded_file($_FILES['productImgUpload']['tmp_name'], $targetFile)) {
                $uploadedImage = $imageFileName; // Store the image filename in database
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error uploading image.']);
                exit;
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid image file type.']);
            exit;
        }
    }

    // Prepare and execute the SQL query to update the product in the database
    try {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, quantity = ?, category = ?";

        // If an image was uploaded, add the image_path field to the query
        if ($uploadedImage) {
            $sql .= ", image_path = ?";
        }

        // Append the WHERE clause
        $sql .= " WHERE id = ?";

        // Prepare the statement
        $stmt = $conn->prepare($sql);
        if ($uploadedImage) {
            // Bind parameters including the image file name
            $stmt->bind_param("ssdisss", $productName, $productDescription, $productPrice, $productQuantity, $productCategory, $uploadedImage, $productID);
        } else {
            // Bind parameters without the image
            $stmt->bind_param("ssdiss", $productName, $productDescription, $productPrice, $productQuantity, $productCategory, $productID);
        }

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Product updated successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error updating product in database.']);
        }

        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }

    // Close the database connection
    $conn->close();
}

?>
