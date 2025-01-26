<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <?php include 'header.php';?>    
</head>
  <body>
  <div class="d-flex flex-row">
    <?php include 'navbar.php'; ?>
    <div class="d-flex flex-column flex-grow-1">
        <div class="row g-3 p-3 container">
            <div class="col-12 col-md-8">
            <h3>My Cart</h3>
                <table class="m-2">
                    <thead>
                        <tr style="border-top: 1px solid gainsboro;">
                            <th style="padding-top: 20px; padding-bottom: 20px; width: 10%">Image</th>
                            <th style="padding-top: 20px; padding-bottom: 20px; width: 30%">Product Description</th>
                            <th style="padding-top: 20px; padding-bottom: 20px; width: 20%">Quantity</th>
                            <th style="padding-top: 20px; padding-bottom: 20px; width: 10%">Total</th>
                            <th style="padding-top: 20px; padding-bottom: 20px; width: 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="cart-table">
                        <!-- Cart items will be displayed here -->
                    </tbody>
                </table>
            </div>
            <div class="col-12 col-md-4">
                <h3>Payment</h3>
                <label for="">Payment Method</label>
                <div class="container mt-4">
  <div class="row">
    <!-- Ship Option -->
    <div class="col-md-6 mb-3">
      <div class="form-check border p-3 rounded">
        <input
          type="radio"
          class="form-check-input"
          id="delivery_strategies_SHIPPING"
          name="delivery_strategies"
        />
        <label
          class="form-check-label d-flex justify-content-between align-items-center"
          for="delivery_strategies_SHIPPING"
        >
          <span>Ship</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 14 14"
            focusable="false"
            aria-hidden="true"
            class="icon"
            style="width: 20px; height: 20px;"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3 10.5h-.9a.7.7 0 0 1-.7-.7V3.5a.7.7 0 0 1 .7-.7h4.2a.7.7 0 0 1 .7.7v.7m-4 6.3a1.2 1.2 0 0 0 2.4 0m-2.4 0a1.2 1.2 0 0 1 2.4 0M7 7v3.5M7 7V4.2M7 7h5.6M7 10.5H5.4m1.6 0h1.6M7 4.2h2.51a.7.7 0 0 1 .495.205L12.6 7m-4 3.5a1.2 1.2 0 0 0 2.4 0m-2.4 0a1.2 1.2 0 0 1 2.4 0m0 0h.9a.7.7 0 0 0 .7-.7V7"
            ></path>
          </svg>
        </label>
      </div>
    </div>

    <!-- Pickup Option -->
    <div class="col-md-6 mb-3">
      <div class="form-check border p-3 rounded">
        <input
          type="radio"
          class="form-check-input"
          id="delivery_strategies_PICKUP"
          name="delivery_strategies"
        />
        <label
          class="form-check-label d-flex justify-content-between align-items-center"
          for="delivery_strategies_PICKUP"
        >
          <span>Pickup in store</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 14 14"
            focusable="false"
            aria-hidden="true"
            class="icon"
            style="width: 20px; height: 20px;"
          >
            <path
              stroke-linecap="round"
              d="m1.4 4.2 1.959-2.612a.47.47 0 0 1 .376-.188h6.53a.47.47 0 0 1 .376.188L12.6 4.2m-11.2 0h11.2m-11.2 0S.8 7 2.8 6.989m9.8-2.79s.6 2.8-1.4 2.79m-8.4 0c2 .01 2.2-2.79 2.2-2.79S5 7 7 7s2-2.8 2-2.8.2 2.8 2.2 2.79m-8.4 0v5.14c0 .26.21.47.47.47H5.6m5.6-5.61v5.14c0 .26-.21.47-.47.47H8.3m-2.7 0V9.57c0-.259.21-.47.47-.47h1.76c.26 0 .47.211.47.47v3.03m-2.7 0h2.7"
            ></path>
          </svg>
        </label>
      </div>
    </div>
  </div>
</div>

                <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                    <div style="width: 300px; height: 300px;">
                        <img style="object-fit: fit; width: 100%; height: 100%;" src="../static/img/gcash.jpg" alt="">
                    </div>
                </div>
                <input type="text" class="form-control mb-3 mt-4" placeholder="Enter the gcash reference number">
                <div class="d-flex justify-content-between">
                    <p style="padding: 0px; margin: 0px">Subtotal</p>
                    <p style="padding: 0px; margin: 0px">$124.99</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p style="padding: 0px; margin: 0px">Shipping</p>
                    <p style="padding: 0px; margin: 0px">Enter shipping address</p>
                </div>
                <div class="d-flex justify-content-between">
                    <strong style="font-size: 2rem">Total</strong>
                    <p style="font-size: 2rem"><span class="text-uppercase">PHP</span> 124.99</p>
                </div>

                <button class="btn w-100 btn-dark">Place Order</button>
            </div>



        </div>
    </div>
</div>


  <?php include 'footer.php';?>
  <script src="../static/js/cart-table.js"></script>
</body>
</html>