<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reports</title>
    <?php include 'header.php';?>    
  </head>
  <body>
    <div class="main">
    <div class="d-flex flex-row">
      <?php include 'navbar.php'; ?>
      <div class="d-flex flex-column flex-grow-1">

        <div class="container g-3 p-3">
          <h3>Reports</h3>

          <!-- Include Bootstrap Icons -->
          <div class="row g-3">
            <!-- Daily Sales Report -->
            <div class="col-12 col-md-4">
              <div class="border rounded p-4">
                <i class="bi bi-graph-up-arrow" style="font-size: 2rem; color: black;"></i> <!-- Better Fill Icon -->
                <h6 class="mt-2">Daily Sales Report</h6>
                <a href="../model/report-daily.php" class="btn btn-outline-dark btn-sm mt-2" target="_blank">
                  <i class="bi bi-printer-fill"></i> Print
                </a>
              </div>
            </div>

            <!-- Monthly Sales Report -->
            <div class="col-12 col-md-4">
              <div class="border rounded p-4">
                <i class="bi bi-pie-chart-fill" style="font-size: 2rem; color: black;"></i> <!-- Fill Icon -->
                <h6 class="mt-2">Monthly Sales Report</h6>
                <a href="../model/report-monthly.php" class="btn btn-outline-dark btn-sm mt-2" target="_blank">
                  <i class="bi bi-printer-fill"></i> Print
                </a>
              </div>
            </div>

            <!-- Yearly Sales Report -->
            <div class="col-12 col-md-4">
              <div class="border rounded p-4">
                <i class="bi bi-bar-chart-fill" style="font-size: 2rem; color: black;"></i> <!-- Fill Icon -->
                <h6 class="mt-2">Yearly Sales Report</h6>
                <a href="../model/report-yearly.php" class="btn btn-outline-dark btn-sm mt-2" target="_blank">
                  <i class="bi bi-printer-fill"></i> Print
                </a>
              </div>
            </div>

            <!-- Product Report -->
            <div class="col-12 col-md-4">
              <div class="border rounded p-4">
                <i class="bi bi-box-seam-fill" style="font-size: 2rem; color: black;"></i> <!-- Product Icon -->
                <h6 class="mt-2">Customer Report</h6>
                <a href="../model/report-product.php" class="btn btn-outline-dark btn-sm mt-2" target="_blank">
                  <i class="bi bi-printer-fill"></i> Print
                </a>
              </div>
            </div>

            <!-- Account Report -->
            <div class="col-12 col-md-4">
              <div class="border rounded p-4">
                <i class="bi bi-person-lines-fill" style="font-size: 2rem; color: black;"></i> <!-- Account Icon -->
                <h6 class="mt-2">Customer Account Report</h6>
                <a href="../model/report-account.php"  class="btn btn-outline-dark btn-sm mt-2" target="_blank">
                  <i class="bi bi-printer-fill"></i> Print
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <?php include 'footer.php';?>
    <script src="../static/js/report-daily.js"></script>

  </body>
</html>
