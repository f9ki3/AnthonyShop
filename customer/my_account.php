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
                  <!-- Action Buttons -->
                  <div class="row mt-5 g-3">
                    <div class="col-6">
                      <button id="edit-profile" class="btn btn-dark w-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-pencil-square me-2"></i> Edit Profile
                      </button>
                    </div>
                    <div class="col-6">
                      <button id="edit-password" class="btn btn-dark w-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-lock me-2"></i> Change Password
                      </button>
                    </div>
                  </div>

                  <!-- Editable Profile Section -->
                  <div id="edit-profile-div" class="mt-4">
                    <div class="d-flex mt-3 flex-row gap-3">
                      <div class="flex-fill">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" value="<?php echo $_SESSION['fname']; ?>" id="firstname" class="form-control" disabled>
                      </div>
                      <div class="flex-fill">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" value="<?php echo $_SESSION['lname']; ?>" id="lastname" class="form-control" disabled>
                      </div>
                    </div>

                    <div class="d-flex mt-3 flex-row gap-3">
                      <div class="flex-fill">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" value="<?php echo $_SESSION['contact']; ?>" id="contact" class="form-control" disabled>
                      </div>
                      <div class="flex-fill">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="<?php echo $_SESSION['email']; ?>" id="email" class="form-control" disabled>
                      </div>
                    </div>

                    <div class="d-flex mt-3 flex-row gap-3">
                      <div class="flex-fill">
                        <label for="address" class="form-label">Complete Address</label>
                        <input type="text" value="<?php echo $_SESSION['address']; ?>" id="address" class="form-control" disabled>
                      </div>
                    </div>

                    <!-- Save and Cancel Buttons -->
                    <div id="edit-save-div" class="row mt-2 g-3" style="display: none;">
                      <div class="col-6">
                        <button onclick="save_profile()" id="save-profile" class="btn border w-100 d-flex align-items-center justify-content-center">
                          <i class="bi bi-save me-2"></i> Save
                        </button>
                      </div>
                      <div class="col-6">
                        <button id="cancel-edit" class="btn border w-100 d-flex align-items-center justify-content-center">
                          <i class="bi bi-x-circle me-2"></i> Cancel
                        </button>
                      </div>
                    </div>
                  </div>

                  <div id="change-password-div" style="display: none;" class="mt-4">
                    <div class="d-flex mt-3 flex-row gap-3">
                      <div class="flex-fill">
                        <label for="current-password" class="form-label">Current Password</label>
                        <input type="password" placeholder="Enter your current password" id="current-password" class="form-control">
                        <div class="invalid-feedback" id="current-password-error">Current password is required.</div>
                      </div>
                    </div>

                    <div class="d-flex mt-3 flex-row gap-3">
                      <div class="flex-fill">
                        <label for="new-password" class="form-label">New password</label>
                        <input type="password" placeholder="Enter your new password" id="new-password" class="form-control">
                        <div class="invalid-feedback" id="new-password-error">New password is required.</div>
                      </div>
                    </div>

                    <div class="d-flex mt-3 flex-row gap-3">
                      <div class="flex-fill">
                        <label for="confirm-password" class="form-label">Confirm password</label>
                        <input type="password" placeholder="Enter your confirm password" id="confirm-password" class="form-control">
                        <div class="invalid-feedback" id="confirm-password-error">Confirm password is required and must match the new password.</div>
                      </div>
                    </div>

                    <!-- Save and Cancel Buttons -->
                    <div id="password-save" class="row mt-2 g-3" style="display: none;">
                      <div class="col-6">
                        <button id="save-change-password" class="btn border w-100 d-flex align-items-center justify-content-center" disabled>
                          <i class="bi bi-save me-2"></i> Save
                        </button>
                      </div>
                      <div class="col-6">
                        <button id="password-cancel" class="btn border w-100 d-flex align-items-center justify-content-center">
                          <i class="bi bi-x-circle me-2"></i> Cancel
                        </button>
                      </div>
                    </div>
                  </div>


                </div>
              </div>

          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="../static/js/edit-my_profile.js"></script>
  </body>
</html>
