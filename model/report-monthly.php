<?php
session_start(); // Start session
include 'connection.php'; // Include database connection

// Query to get total order amount per day for this month
$sql = "SELECT DATE(order_date) AS order_day, SUM(total) AS total_amount 
        FROM `orders` 
        WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE()) 
        GROUP BY DATE(order_date)
        ORDER BY order_day";

$result = $conn->query($sql);

// Query to get the total number of orders for this month
$sql_total_orders = "SELECT COUNT(order_no) AS total_orders 
                     FROM `orders` 
                     WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";

$result_total_orders = $conn->query($sql_total_orders);

// Query to get this month's total revenue
$sql_month_revenue = "SELECT SUM(total) AS month_revenue 
                      FROM `orders` 
                      WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";

$result_month_revenue = $conn->query($sql_month_revenue);

// Initialize the response array
$response = [
    'list' => [],
    'total_orders' => 0,
    'month_revenue' => 0,
    'report_month' => date('F Y') // Add this month's name to the response
];

// Fetch order data per day
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

// Fetch this month's total revenue
if ($result_month_revenue && $result_month_revenue->num_rows > 0) {
    $month_revenue_row = $result_month_revenue->fetch_assoc();
    $response['month_revenue'] = $month_revenue_row['month_revenue']; // Store this month's revenue
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monthly Reports</title>
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
      <h4>Monthly Sales Report - <?= $response['report_month'] ?></h4>
      <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
        <p style="padding: 0; margin: 0">Date:</p>
        <p style="padding: 0; margin: 0"><?= $response['report_month'] ?></p>
      </div>
      <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
        <p style="padding: 0; margin: 0">Total Orders</p>
        <p style="padding: 0; margin: 0"><?= $response['total_orders'] ?></p>
      </div>
      <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
        <p style="padding: 0; margin: 0">Total Revenue</p>
        <p style="padding: 0; margin: 0">₱<?= number_format($response['month_revenue'], 2) ?></p>
      </div>

      <table class="table table-bordered mt-3">
        <thead>
          <tr>
            <td scope="col">Date</td>
            <td scope="col">Total Amount</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($response['list'] as $item): ?>
            <tr>
              <td><?= $item['order_day'] ?></td>
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
