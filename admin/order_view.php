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
                            <!-- Cart Items -->
                    <div id="cart-table-div" class="col-12 col-md-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>View Transaction</h3>
                            <button onclick="printPage()" class="btn btn-dark">Print Waybill</button>
                        </div>

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
                    <div class="col-12 col-md-4" id="transaction-div" style="display: block;"></div>

            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="print-div">
        <div class="container">
            <!-- Header Section -->
            <div class="header d-flex flex-row">
                <div style="height: 100px; width: 100px">
                    <img style="object-fit: cover; width: 100%; height: 100%" src="../static/img/logo.png" alt="">
                </div>
                <div class="contact-info ms-3 mt-3">
                    <p>Email: Anthonys Melo's Dress Chicken @gmail.com</p>
                    <p>Phone: 0921121219</p>
                    <p>Address: Plaridel Public Market</p>
                </div>
            </div>
            <hr>
            <div class="flex-row d-flex justify-content-between">
                <p><strong>Date:</strong></p>
                <p id="order_date">2025-01-30</p>
            </div>
            <!-- Transaction Info -->
            <div class="flex-row d-flex justify-content-between">
                <p><strong>Transaction Code:</strong></p>
                <p id="order_hash">5ba05e5466af3946</p>
            </div>

            <div class="flex-row d-flex justify-content-between">
                <p><strong>Customer Name:</strong></p>
                <p id="customer_name">John Doe</p>
            </div>

            <div class="flex-row d-flex justify-content-between">
                <p><strong>Contact:</strong></p>
                <p id="contact">+123456789</p>
            </div>

            <div class="flex-row d-flex justify-content-between">
                <p><strong>Email:</strong></p>
                <p id="email">johndoe@example.com</p>
            </div>

            <div class="flex-row d-flex justify-content-between">
                <p><strong>Address:</strong></p>
                <p id="address">123 Main St, City, Country</p>
            </div>

            <div class="flex-row d-flex justify-content-between">
                <p><strong>Payment Type:</strong></p>
                <p id="payment_type">GCash</p>
            </div>

            <!-- Cart Items Table -->
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">Product Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <!-- Cart items will be dynamically added here -->
                    <tr>
                        <td>Product 1</td>
                        <td>2</td>
                        <td>₱500</td>
                    </tr>
                    <tr>
                        <td>Product 2</td>
                        <td>1</td>
                        <td>₱300</td>
                    </tr>
                </tbody>
            </table>

            <!-- Order Summary -->
            <div class="order-summary">
                <div class="flex-row d-flex justify-content-between">
                    <h6>Subtotal:</h6>
                    <h6 id="subtotal">₱800</h6>
                </div>

                <div class="flex-row d-flex justify-content-between">
                    <h6>Shipping Fee:</h6>
                    <h6 id="shipping_fee">₱50</h6>
                </div>

                <div class="flex-row d-flex justify-content-between">
                    <h5><strong>Total:</strong></h5>
                    <h5 id="total"><strong>₱850</strong></h5>
                </div>
            </div>
            <hr>
            <!-- Footer Section -->
            <div class="footer d-flex justify-content-center mt-3">
                <p style="width: 50%" class="text-center">Thanks for buying at Anthony Melo's Dress Chicken and Frozen Food!</p>
            </div>
        </div>
    </div>



    <?php include 'footer.php'; ?>
    <script src="../static/js/getTransaction.js"></script>
    <script src="../static/js/print.js"></script>
  </body>
</html>

