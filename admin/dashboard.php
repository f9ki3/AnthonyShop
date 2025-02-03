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
            <!-- Today's Sales -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="card-title text-muted mb-1">Today's Sales</h6>
                                <p id="todays-sales" class="card-text fw-bold display-6">0</p>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <i class="bi text-muted bi-currency-peso fs-1 text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="card-title text-muted mb-1">Today's Orders</h6>
                                <p id="total-orders" class="card-text fw-bold display-6">0</p>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <i class="bi text-muted bi-cart-check fs-1 text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Customers -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="card-title text-muted mb-1">Total Customers</h6>
                                <p id="total-customers" class="card-text fw-bold display-6">0</p>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <i class="bi text-muted bi-people fs-1 text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Products -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h6 class="card-title text-muted mb-1">Total Products</h6>
                                <p id="total-products" class="card-text fw-bold display-6">0</p>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <i class="bi bi-box text-muted fs-1 text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- Top and Least Products Sales -->
          <div class="row mt-4">
            <div class="col-md-6">
              <h5>Low Stock Products</h5>
              <ul id="most-sold-list" class="list-group">
                <!-- Most sold products will be inserted here -->
              </ul>
            </div>
            <div class="col-md-6">
              <h5>High Stock Products</h5>
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
    <script src="../static/js/dashboard-count.js"></script>
    <script src="../static/js/dashboard-stat.js"></script>
    <script src="../static/js/dashboard-inv.js"></script>

  </body>
</html>
