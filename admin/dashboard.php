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
          <div class="row g-3"> <!-- Added gap between columns -->
              <!-- Today's Sales -->
              <div class="col-12 col-sm-6 col-md-3">
                  <div class="card shadow-sm">
                      <div class="card-body">
                          <div class="d-flex align-items-center">
                              <div class="flex-grow-1">
                                  <h6 class="card-title text-muted mb-1">Today's Sales</h6>
                                  <div class="d-flex align-items-center">
                                      <p class="fw-bold display-6 mb-0">₱</p>
                                      <p id="todays-sales" class="fw-bold display-6 mb-0">0</p>
                                  </div>
                              </div>
                              <i class="bi bi-graph-up-arrow fs-1 text-dark"></i>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Today's Orders -->
              <div class="col-12 col-sm-6 col-md-3">
                  <div class="card shadow-sm">
                      <div class="card-body">
                          <div class="d-flex align-items-center">
                              <div class="flex-grow-1">
                                  <h6 class="card-title text-muted mb-1">Today's Orders</h6>
                                  <p id="total-orders" class="fw-bold display-6 mb-0">0</p>
                              </div>
                              <i class="bi bi-cart-check fs-1 text-dark"></i>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Total Customers -->
              <div class="col-12 col-sm-6 col-md-3">
                  <div class="card shadow-sm">
                      <div class="card-body">
                          <div class="d-flex align-items-center">
                              <div class="flex-grow-1">
                                  <h6 class="card-title text-muted mb-1">Total Customers</h6>
                                  <p id="total-customers" class="fw-bold display-6 mb-0">0</p>
                              </div>
                              <i class="bi bi-people fs-1 text-dark"></i>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Total Products -->
              <div class="col-12 col-sm-6 col-md-3">
                  <div class="card shadow-sm">
                      <div class="card-body">
                          <div class="d-flex align-items-center">
                              <div class="flex-grow-1">
                                  <h6 class="card-title text-muted mb-1">Total Products</h6>
                                  <p id="total-products" class="fw-bold display-6 mb-0">0</p>
                              </div>
                              <i class="bi bi-box fs-1 text-dark"></i>
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
