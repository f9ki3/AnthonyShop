<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $productPrice = $_POST["productPrice"];
    $productQuantity = $_POST["productQuantity"];
    $productCategory = $_POST["productCategory"];

    // Handle file upload
    if (isset($_FILES["productImage"]) && $_FILES["productImage"]["error"] == 0) {
        $targetDir = "../static/img/"; // Save image in static/img directory
        $fileName = time() . "_" . basename($_FILES["productImage"]["name"]); // Unique filename
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allowed file types
        $allowedTypes = ["jpg", "jpeg", "png"];

        if (in_array(strtolower($fileType), $allowedTypes)) {
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFilePath)) {
                // Insert into database
                $sql = "INSERT INTO products (name, description, price, quantity, image_path, category) 
                        VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssdiss", $productName, $productDescription, $productPrice, $productQuantity, $fileName, $productCategory);

                if ($stmt->execute()) {
                    echo json_encode([
                        "status" => "success",
                        "message" => "Product saved successfully!",
                        "image_path" => $targetFilePath
                    ]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to save product."]);
                }

                $stmt->close();
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to upload image."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid image format."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No image uploaded."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

$conn->close();
?>
