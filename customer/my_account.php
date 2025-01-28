<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Account</title>
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
              <h3>My Account</h3>
              <!-- Customer Information -->
              <div style="max-width: 600px;">
              <div class="d-flex mt-5 flex-row gap-3">
                  <div class="flex-fill">
                    <button class="btn btn-dark w-100 d-flex align-items-center justify-content-center">
                      <i class="bi bi-pencil-square me-2"></i> Edit Profile
                    </button>
                  </div>
                  <div class="flex-fill">
                    <button class="btn btn-dark w-100 d-flex align-items-center justify-content-center">
                      <i class="bi bi-lock me-2"></i> Change Password
                    </button>
                  </div>
                </div>


                <div class="d-flex mt-3 flex-row gap-3">
                  <div class="flex-fill">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" value="<?php echo $_SESSION['fname']; ?>" id="firstname" class="form-control">
                  </div>
                  <div class="flex-fill">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" value="<?php echo $_SESSION['lname']; ?>" id="lastname" class="form-control">
                  </div>
                </div>

                <div class="d-flex mt-3 flex-row gap-3">
                  <div class="flex-fill">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" value="<?php echo $_SESSION['contact']; ?>" id="contact" class="form-control">
                  </div>
                  <div class="flex-fill">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="<?php echo $_SESSION['email']; ?>" id="email" class="form-control">
                  </div>
                </div>

                <div class="d-flex mt-3 flex-row gap-3">
                  <div class="flex-fill">
                    <label for="address" class="form-label">Complete Address</label>
                    <input type="text" value="<?php echo $_SESSION['address']; ?>" id="address" class="form-control">
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
