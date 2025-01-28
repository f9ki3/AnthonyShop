<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Order</title>
    <?php include 'header.php'; ?>    
  </head>
  <body>
    <div class="d-flex flex-row">
      <?php include 'navbar.php'; ?>
      <div class="d-flex flex-column flex-grow-1">
      <?php include 'search.php'; ?>
        <div class="container p-3">
          <div class="row g-3">
            <!-- Cart Items -->
            <div id="cart-table-div" class="col-12">
              <h3>My Orders</h3>
              <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10%;">Order Code</th>
                            <th scope="col" style="width: 10%;">Date</th>
                            <th scope="col" style="width: 20%;">Account Name</th>
                            <th scope="col" style="width: 20%;">Address</th>
                            <th scope="col" style="width: 10%;">Total</th>
                            <th scope="col" style="width: 10%;">Status</th>
                            <th scope="col" style="width: 10%;"></th>
                        </tr>
                    </thead>
                    <tbody id="order-table">
                        <!-- Orders will be dynamically rendered here -->
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
    </div>

    <?php include 'footer.php'; ?>
    <script src="../static/js/getOrders.js"></script>
  </body>
</html>
