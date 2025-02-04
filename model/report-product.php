<?php 
session_start(); // Start session
include 'connection.php'; // Include database connection

// Query to get all products with their price and quantity, sorted by quantity (low to high)
$sql = "SELECT id, name, price, quantity 
        FROM `products`
        ORDER BY quantity ASC"; // Sorting by quantity in ascending order

$result = $conn->query($sql);

// Initialize the response array
$response = [
    'list' => [], // This will store product data
    'total_products' => 0, // Total number of unique products
    'order_date' => date('Y-m-d') // Today's date for the report
];

// Fetch product data
if ($result && $result->num_rows > 0) {
    // Loop through the result and store each product
    while ($row = $result->fetch_assoc()) {
        $response['list'][] = $row; // Store each product in the 'list' key
    }
    // Count the total number of unique products based on 'id'
    $response['total_products'] = $result->num_rows;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Report</title>
    <?php include '../admin/header.php'; ?>    
  </head>
  <body>
    <div class="container">
      <div class="header d-flex flex-row">
        <div style="height: 100px; width: 100px">
          <img style="object-fit: cover; width: 100%; height: 100%" src="../static/img/logo.png" alt="Logo">
        </div>
        <div class="contact-info ms-3 mt-3">
          <p style="padding: 0; margin: 0">Antdonys Melo's Dress Chicken and Frozen Food</p>
          <p style="padding: 0; margin: 0">0921121219 / adcf@gmail.com</p>
          <p style="padding: 0; margin: 0">Plaridel Public Market</p>
        </div>
      </div>
      <hr>
      <h4>Product Report - <?= $response['order_date'] ?></h4>
      <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
        <p style="padding: 0; margin: 0">Date:</p>
        <p style="padding: 0; margin: 0"><?= $response['order_date'] ?></p>
      </div>
      <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
        <p style="padding: 0; margin: 0">Total Products</p>
        <p style="padding: 0; margin: 0"><?= $response['total_products'] ?></p>
      </div>

      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <td scope="col">Product Name</td>
            <td scope="col">Price</td>
            <td scope="col">Quantity</td>
            <td scope="col">Total Capital</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($response['list'] as $item): ?>
            <tr>
              <td><?= htmlspecialchars($item['name']) ?></td>
              <td>₱<?= number_format($item['price'], 2) ?></td>
              <td><?= $item['quantity'] ?></td>
              <td>₱<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    
    <script>
      // Print the page and close the tab after print dialog is closed
      window.onload = function() {
        window.print();
      };

      window.onafterprint = function() {
        // Close the tab after the print dialog is closed or canceled
        window.close();
      };
    </script>
  </body>
</html>
