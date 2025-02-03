<?php
session_start(); // Start session
include 'connection.php'; // Include database connection

// Query to get total order amount per user for today
$sql = "SELECT user_id, CONCAT(firstname, ' ', lastname) AS name, SUM(total) AS total_amount 
        FROM `orders` 
        WHERE DATE(order_date) = CURDATE() 
        GROUP BY user_id";

$result = $conn->query($sql);

// Query to get the total number of orders for today
$sql_total_orders = "SELECT COUNT(order_no) AS total_orders 
                     FROM `orders` 
                     WHERE DATE(order_date) = CURDATE()";

$result_total_orders = $conn->query($sql_total_orders);

// Query to get today's total revenue
$sql_today_revenue = "SELECT SUM(total) AS today_revenue 
                      FROM `orders` 
                      WHERE DATE(order_date) = CURDATE()";

$result_today_revenue = $conn->query($sql_today_revenue);

// Initialize the response array
$response = [
    'list' => [],
    'total_orders' => 0,
    'today_revenue' => 0,
    'order_date' => date('Y-m-d') // Add today's date to the response
];

// Fetch user order data
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['list'][] = $row; // Store each row inside the 'list' key
    }
}

// Fetch total orders count
if ($result_total_orders && $result_total_orders->num_rows > 0) {
    $total_orders_row = $result_total_orders->fetch_assoc();
    $response['total_orders'] = $total_orders_row['total_orders']; // Store total orders count
}

// Fetch today's total revenue
if ($result_today_revenue && $result_today_revenue->num_rows > 0) {
    $today_revenue_row = $result_today_revenue->fetch_assoc();
    $response['today_revenue'] = $today_revenue_row['today_revenue']; // Store today's revenue
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Reports</title>
    <?php include '../admin/header.php'; ?>    
  </head>
  <body>
    <div class="container">
      <div class="header d-flex flex-row">
        <div style="height: 100px; width: 100px">
          <img style="object-fit: cover; width: 100%; height: 100%" src="../static/img/logo.png" alt="">
        </div>
        <div class="contact-info ms-3 mt-3">
          <p style="padding: 0; margin:0">Antdonys Melo's Dress Chicken and Frozen Food</p>
          <p style="padding: 0; margin:0">0921121219 / adcf@gmail.com</p>
          <p style="padding: 0; margin:0">Plaridel Public Market</p>
        </div>
      </div>
      <hr>
      <h4>Daily Sales Report</h4>
      <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
        <p style="padding: 0; margin: 0">Date:</p>
        <p style="padding: 0; margin: 0"><?= $response['order_date'] ?></p>
      </div>
      <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
        <p style="padding: 0; margin: 0">Total Orders</p>
        <p style="padding: 0; margin: 0"><?= $response['total_orders'] ?></p>
      </div>
      <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
        <p style="padding: 0; margin: 0">Total Revenue</p>
        <p style="padding: 0; margin: 0">₱<?= number_format($response['today_revenue'], 2) ?></p>
      </div>

      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <td scope="col">Customer Name</td>
            <td scope="col">Total Amount</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($response['list'] as $item): ?>
            <tr>
              <td><?= htmlspecialchars($item['name']) ?></td>
              <td>₱<?= number_format($item['total_amount'], 2) ?></td>
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



