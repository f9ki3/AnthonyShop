<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
  <?php include 'navbar.php'; ?>
  
  <div class="container mt-5" style="max-width: 400px; margin: 0 auto; height: 90vh">
    <form id="registrationForm">
      <h4 style="padding: 0px; margin: 0px;" class="fw-bolder mb-3">Registration</h4>

      <!-- Firstname and Lastname -->
      <div class="row mb-3">
        <div class="col-6">
          <label for="firstname" class="form-label">Firstname</label>
          <input type="text" class="form-control" id="firstname" placeholder="Enter your firstname">
          <div class="invalid-feedback">Firstname is required.</div>
        </div>
        <div class="col-6">
          <label for="lastname" class="form-label">Lastname</label>
          <input type="text" class="form-control" id="lastname" placeholder="Enter your lastname">
          <div class="invalid-feedback">Lastname is required.</div>
        </div>
      </div>

      <!-- Email and Contact -->
      <div class="row mb-3">
        <div class="col-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email">
          <div class="invalid-feedback">A valid email is required.</div>
        </div>
        <div class="col-6">
          <label for="contact" class="form-label">Contact</label>
          <input type="tel" class="form-control" id="contact" placeholder="Enter your contact number">
          <div class="invalid-feedback">Contact number is required.</div>
        </div>
      </div>

      <!-- Address -->
      <div class="mb-3">
        <label for="address" class="form-label">Complete Address</label>
        <textarea class="form-control" id="address" rows="3" placeholder="Enter your address"></textarea>
        <div class="invalid-feedback">Address is required.</div>
      </div>

      <!-- Password -->
      <div class="row mb-3">
        <div class="col-6">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter your password">
          <div class="invalid-feedback">Password must be at least 6 characters long.</div>
        </div>
        <div class="col-6">
          <label for="confirm-password" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password">
          <div class="invalid-feedback">Passwords do not match.</div>
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn rounded-3 w-100 bg-red mt-3 text-light">Register</button>
    </form>
    <p style="font-size: 12px" class="mt-3">Copyright 2025-2026</p>
  </div>

  <?php include 'footer_container.php'?> 
  <?php include 'footer.php'; ?>
  <script src="static/js/register.js"></script>
</body>
</html>
