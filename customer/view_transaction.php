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
                <table class="table mt-3">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">Image</th>
                        <th scope="col" style="width: 30%;">Product Description</th>
                        <th scope="col" style="width: 20%;">Quantity</th>
                        <th scope="col" style="width: 10%;">Total</th>
                    </tr>
                    </thead>
                    <tbody id="cart-table">
                    <tr style="border-top: 1px solid gainsboro;">
                        <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                            <div style="height: 100px; width: 100px" class="rounded">
                                <img class="rounded" style="object-fit: cover; height: 100%; width: 100%" src="../static/img/luncheonmeat.jpg" alt="Luncheon Meat">
                            </div>
                        </td>
                        <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                            <p style="padding: 0px; margin: 0px">Luncheon Meat</p>
                            <p style="padding: 0px; margin: 0px">₱  85.00</p>
                        </td>
                        <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                            <p style="padding: 0px; margin: 0px">1</p>
                        </td>
                        <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">₱  85.00</td>
                    </tr>
                </tbody>
                </table>
                </div>
                
                <!-- Checkout Section -->
                <div class="col-12 col-md-4" id="delivery-div" style="display: block;">
                <div class="container mt-4">
                    <div class="row g-3">
                        <h5>Order Information</h5>
                        <!-- Customer Information -->
                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="address" class="form-label">Transaction Code</label>
                                <input type="text" value="Marilao, Bulacan" id="address" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="address" class="form-label">Date of Order</label>
                                <input type="text" value="Marilao, Bulacan" id="address" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" value="Robert" id="firstname" class="form-control" disabled>
                            </div>
                            <div class="flex-fill">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" value="Moore" id="lastname" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" value="09871287761" id="contact" class="form-control" disabled>
                            </div>
                            <div class="flex-fill">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="robert@gmail.com" id="email" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="address" class="form-label">Complete Address</label>
                                <input type="text" value="Marilao, Bulacan" id="address" class="form-control" disabled>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="col-12">
                            <label class="form-label">Payment Method</label>
                            <div class="d-flex flex-row justify-content-start border rounded p-2">
                                <!-- Cash on Delivery Option -->
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="payment-method" id="cod" value="cod" checked disabled>
                                    <label class="form-check-label" for="cod">Cash on Delivery</label>
                                </div>

                                <!-- G-Cash Option -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment-method" id="gcash" value="gcash" disabled>
                                    <label class="form-check-label" for="gcash">G-Cash</label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Summary -->
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="mb-0">Subtotal</p>
                        <div class="d-flex align-items-center">
                            <span class="text-uppercase fs-5">₱</span>
                            <p class="mb-0 fs-5" id="sub_total">85.00</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Shipping Fee</p>
                        <div class="d-flex align-items-center">
                            <span class="text-uppercase fs-5">₱</span>
                            <p id="shipping" class="mb-0 fs-5">120.00</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <strong class="fs-3">Total</strong>
                        <div class="d-flex align-items-center">
                            <span class="text-uppercase fw-bolder fs-3">₱</span>
                            <p class="mb-0 fs-3 fw-bolder" id="amount_total">205.00</p>
                        </div>
                    </div>

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

