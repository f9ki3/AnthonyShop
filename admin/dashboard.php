<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <?php include 'header.php';?>    

    <!-- Include ApexCharts library -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Include jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <div class="d-flex flex-row">
      <?php include 'navbar.php'; ?>
      <div class="d-flex flex-column flex-grow-1">

        <div class="container g-3 p-3">
          <h3>Dashboard</h3>

          <!-- Summary Stats -->
          <div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Today's Sales</h5>
                  <p id="todays-sales" class="card-text">Loading...</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Orders</h5>
                  <p id="total-orders" class="card-text">Loading...</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Customers</h5>
                  <p id="total-customers" class="card-text">Loading...</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Products</h5>
                  <p id="total-products" class="card-text">Loading...</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Top and Least Products Sales -->
          <div class="row mt-4">
            <div class="col-md-6">
              <h5>Top 5 Most Sold Products</h5>
              <ul id="most-sold-list" class="list-group">
                <!-- Most sold products will be inserted here -->
              </ul>
            </div>
            <div class="col-md-6">
              <h5>Top 5 Least Sold Products</h5>
              <ul id="least-sold-list" class="list-group">
                <!-- Least sold products will be inserted here -->
              </ul>
            </div>
          </div>

          <!-- Charts Section -->
          <div class="row mt-4">
            <div class="col-md-6">
              <h5>Daily Sales</h5>
              <div id="daily-sales-chart"></div>
            </div>
            <div class="col-md-6">
              <h5>Monthly Sales</h5>
              <div id="monthly-sales-chart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php';?>

    <!-- AJAX Script to load data and update the dashboard -->
    <script>
      $(document).ready(function(){
        // Dummy data for most and least sold products
        var dummyData = {
          mostSold: [
            { product_name: "Product A", total_sales: 150 },
            { product_name: "Product B", total_sales: 120 },
            { product_name: "Product C", total_sales: 110 },
            { product_name: "Product D", total_sales: 90 },
            { product_name: "Product E", total_sales: 80 }
          ],
          leastSold: [
            { product_name: "Product F", total_sales: 10 },
            { product_name: "Product G", total_sales: 12 },
            { product_name: "Product H", total_sales: 15 },
            { product_name: "Product I", total_sales: 18 },
            { product_name: "Product J", total_sales: 20 }
          ],
          todaysSales: "$2,500",
          totalOrders: "250",
          totalCustomers: "150",
          totalProducts: "20",
          dailySalesData: [120, 200, 150, 170, 180],
          dailySalesCategories: ["Mon", "Tue", "Wed", "Thu", "Fri"],
          monthlySalesData: [2000, 1800, 2500, 2200, 2400],
          monthlySalesCategories: ["Jan", "Feb", "Mar", "Apr", "May"]
        };

        // Update the dashboard stats
        $('#todays-sales').text(dummyData.todaysSales);
        $('#total-orders').text(dummyData.totalOrders);
        $('#total-customers').text(dummyData.totalCustomers);
        $('#total-products').text(dummyData.totalProducts);

        // Populate the top 5 most sold products
        var mostSoldList = '';
        dummyData.mostSold.forEach(function(item) {
          mostSoldList += `<li class="list-group-item">${item.product_name}: ${item.total_sales} units sold</li>`;
        });
        $('#most-sold-list').html(mostSoldList);

        // Populate the top 5 least sold products
        var leastSoldList = '';
        dummyData.leastSold.forEach(function(item) {
          leastSoldList += `<li class="list-group-item">${item.product_name}: ${item.total_sales} units sold</li>`;
        });
        $('#least-sold-list').html(leastSoldList);

        // Set up Daily Sales Area Chart
        var dailySalesOptions = {
          chart: {
            type: 'area',
            height: 350
          },
          series: [{
            name: 'Sales',
            data: dummyData.dailySalesData
          }],
          xaxis: {
            categories: dummyData.dailySalesCategories
          }
        };
        var dailySalesChart = new ApexCharts(document.querySelector("#daily-sales-chart"), dailySalesOptions);
        dailySalesChart.render();

        // Set up Monthly Sales Bar Chart
        var monthlySalesOptions = {
          chart: {
            type: 'bar',
            height: 350
          },
          series: [{
            name: 'Sales',
            data: dummyData.monthlySalesData
          }],
          xaxis: {
            categories: dummyData.monthlySalesCategories
          }
        };
        var monthlySalesChart = new ApexCharts(document.querySelector("#monthly-sales-chart"), monthlySalesOptions);
        monthlySalesChart.render();
      });
    </script>

  </body>
</html>
