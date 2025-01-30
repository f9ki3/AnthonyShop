<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders</title>
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
          <div id="cart-table-div" class="col-12">
            <h3>Orders</h3>
            <table class="table table-hover mt-3">
              <thead>
                <tr>
                  <th scope="col" style="width: 10%;">Order Code</th>
                  <th scope="col" style="width: 10%;">Date</th>
                  <th scope="col" style="width: 20%;">Account Name</th>
                  <th scope="col" style="width: 20%;">Address</th>
                  <th scope="col" style="width: 10%;">Total</th>
                  <th scope="col" style="width: 10%;">Status</th>
                  <th scope="col" style="width: 15%;">Action</th>
                </tr>
              </thead>
              <tbody id="order-table">
              </tbody>
            </table>
            <div>
              <button id="previous" class="btn btn-outline-dark" disabled>Previous</button>
              <button id="next" class="btn btn-outline-dark">Next</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php';?>

    <script src="../static/js/admin_getOrders.js"></script>
    <script src="../static/js/admin_actionOrders.js"></script>
  </body>
</html>
