<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Transaction</title>
    <?php include 'header.php'; ?>    
    <link rel="stylesheet" href="../static/css/print.css">
  </head>
  <body>
    <div class="main">
        <div class="d-flex flex-row">
        <?php include 'navbar.php'; ?>
        <div class="d-flex flex-column flex-grow-1">
            <div class="container p-3">
            <div class="row g-3">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-3">
                        <h3>View Transaction</h3>
                        <div>
                            <a href="orders.php" class="btn rounded btn-sm btn-outline-dark">
                                <i class="bi bi-arrow-return-left"></i> Back
                            </a>

                            <button onclick="printPage()" class="btn btn-sm btn-dark">
                                <i class="bi bi-printer"></i> Print Waybill
                            </button>
                        </div>
                    </div>
                    <!-- Checkout Section -->
                    <div class="col-12 col-md-4" id="transaction-div" style="display: block;"></div>
                    <div id="cart-table-div" class="col-12 col-md-8">

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
                    

            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="print-div" id="transaction-container">   
    </div>
    <?php include 'footer.php'; ?>
    <script src="../static/js/getReciept.js"></script>
    <script src="../static/js/getTransaction.js"></script>
    <script src="../static/js/print.js"></script>
  </body>
</html>

