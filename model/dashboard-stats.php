<?php
session_start();
include 'connection.php';

// Get the current date
$currentDate = date('Y-m-d');

// Initialize the sales_series array
$sales_series = [];

// Daily sales query for the last 5 days
$query_daily = "
    SELECT DATE(order_date) as date, SUM(total) as sales
    FROM orders
    GROUP BY DATE(order_date)
    ORDER BY DATE(order_date) 
    LIMIT 5
";

// Execute the daily sales query
$result_daily = mysqli_query($conn, $query_daily);

if ($result_daily) {
    while ($row = mysqli_fetch_assoc($result_daily)) {
        // Add each date's sales data to the daily_sales array
        $sales_series['daily_sales'][] = [
            'date' => $row['date'],
            'sales' => $row['sales']
        ];
    }
}

// Monthly sales query for the last 5 months
$query_monthly = "
    SELECT DATE_FORMAT(order_date, '%Y-%m') as month, SUM(total) as sales
    FROM orders
    GROUP BY month
    ORDER BY month 
    LIMIT 5
";

// Execute the monthly sales query
$result_monthly = mysqli_query($conn, $query_monthly);

if ($result_monthly) {
    while ($row = mysqli_fetch_assoc($result_monthly)) {
        // Add each month's sales data to the monthly_sales array
        $sales_series['monthly_sales'][] = [
            'month' => $row['month'],
            'sales' => $row['sales']
        ];
    }
}

// Output the combined result as JSON
header('Content-Type: application/json');
echo json_encode($sales_series);
?>

