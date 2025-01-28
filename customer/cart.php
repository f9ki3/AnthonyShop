<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
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
              <h3>My Cart</h3>
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col" style="width: 10%;">Image</th>
                    <th scope="col" style="width: 30%;">Product Description</th>
                    <th scope="col" style="width: 20%;">Quantity</th>
                    <th scope="col" style="width: 10%;">Total</th>
                    <th scope="col" style="width: 10%;">Action</th>
                  </tr>
                </thead>
                <tbody id="cart-table">
                  <!-- Cart items will be dynamically rendered -->
                </tbody>
              </table>
            </div>
            
            <!-- Checkout Section -->
            <div class="col-12 col-md-4" id="delivery-div" style="display: none">
              <div class="container mt-4">
                <div class="row g-3">
                  <h5>Delivery Information</h5>
                  <!-- Customer Information -->
                  <div class="d-flex flex-row gap-3">
                    <div class="flex-fill">
                      <label for="firstname" class="form-label">First Name</label>
                      <input type="text" value="<?php echo $_SESSION['fname']; ?>" id="firstname" class="form-control">
                    </div>
                    <div class="flex-fill">
                      <label for="lastname" class="form-label">Last Name</label>
                      <input type="text" value="<?php echo $_SESSION['lname']; ?>" id="lastname" class="form-control">
                    </div>
                  </div>

                  <div class="d-flex flex-row gap-3">
                    <div class="flex-fill">
                      <label for="contact" class="form-label">Contact</label>
                      <input type="text" value="<?php echo $_SESSION['contact']; ?>" id="contact" class="form-control">
                    </div>
                    <div class="flex-fill">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" value="<?php echo $_SESSION['email']; ?>" id="email" class="form-control">
                    </div>
                  </div>

                  <div class="d-flex flex-row gap-3">
                    <div class="flex-fill">
                      <label for="address" class="form-label">Complete Address</label>
                      <input type="text" value="<?php echo $_SESSION['address']; ?>" id="address" class="form-control">
                    </div>
                  </div>



                  <!-- Payment Method -->
                  <div class="col-12">
                    <label class="form-label">Select Payment Method</label>
                    <div class="d-flex flex-row justify-content-start border rounded p-2">
                      <!-- Cash on Delivery Option -->
                      <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="payment-method" id="cod" value="cod" checked>
                        <label class="form-check-label" for="cod">Cash on Delivery</label>
                      </div>

                      <!-- G-Cash Option -->
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment-method" id="gcash" value="gcash">
                        <label class="form-check-label" for="gcash">G-Cash</label>
                      </div>
                    </div>
                  </div>
                  
                  <!-- GCash QR Code -->
                  <div id="g-cash-div" style="display: none">
                    <div class="col-12">
                      <div class="d-flex justify-content-center align-items-center" style="height: 260px;">
                        <div style="width: 250px; height: 250px;">
                          <img class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" src="../static/img/gcash.jpg" alt="GCash QR Code">
                        </div>
                      </div>
                    </div>

                    <!-- GCash Reference -->
                    <div class="col-12">
                      <input id="reference" type="text" class="form-control" placeholder="Enter the GCash reference number">
                    </div>
                  </div>
                </div>
                <!-- Summary -->
                <div class="d-flex mt-3 justify-content-between">
                  <p class="mb-0">Subtotal</p>
                  <div class="d-flex align-items-center">
                    <span class="text-uppercase fs-5">₱</span>
                    <p class="mb-0 fs-5" id="sub_total">0.00</p>
                  </div>
                </div>

                <div class="d-flex justify-content-between mt-2">
                  <p class="mb-0">Shipping Fee</p>
                  <div class="d-flex align-items-center">
                    <span class="text-uppercase fs-5">₱</span>
                    <p id="shipping" class="mb-0 fs-5">120.00</p>
                  </div>
                </div>

                <div class="d-flex justify-content-between mt-3">
                  <strong class="fs-5">Total</strong>
                  <div class="d-flex align-items-center">
                    <span class="text-uppercase fw-bolder fs-5">₱</span>
                    <p class="mb-0 fs-4 fw-bolder" id="amount_total">0.00</p>
                  </div>
                </div>


                <!-- Place Order Button -->
                <button onclick="place_order()" id="purchase-btn" class="btn w-100 btn-dark mt-3">Place Order</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="../static/js/cart-table.js"></script>
    <script src="../static/js/select-payment.js"></script>
    <script src="../static/js/purchase.js"></script>
  </body>
</html>
