<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Transaction</title>
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
                <div id="cart-table-div" class="col-12 col-md-8">
                <h3>View Transaction</h3>
                <table class="table  mt-3">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">Image</th>
                        <th scope="col" style="width: 30%;">Product Description</th>
                        <th scope="col" style="width: 20%;">Quantity</th>
                        <th scope="col" style="width: 10%;">Total</th>
                    </tr>
                    </thead>
                    <tbody id="transaction-table">
                    
                    </tbody>
                </table>
                </div>
                
                <!-- Checkout Section -->
                <div class="col-12 col-md-4" id="transaction-div" style="display: block;">
                
                </div>

                    
            
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="../static/js/getTransaction.js"></script>
  </body>
</html>

