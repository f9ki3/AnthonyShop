<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
<?php include 'header.php'?> 
<?php include 'navbar.php'?>
<div class="container mt-5" style="max-width: 400px; margin: 0 auto; height: 90vh">
  <div>
    <img style="height: 100px;" src="static/img/logo.png" alt="">
    <h4 style="padding: 0px; margin: 0px" class="fw-bolder">Anthony Melo's</h4>
    <p style="margin: 0; padding: 0px; font-size: 12px" class="mb-3">Dress Chicken and Frozen Food</p>
  </div>
  <div class="form-floating">
    <input type="email" class="form-control form-control-sm rounded-3 rounded-bottom-0" id="floatingEmail" placeholder="Email">
    <label for="floatingEmail">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control form-control-sm rounded-3 rounded-top-0 border-top-0" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
  </div>
  <button class="btn rounded-3 w-100 bg-red mt-3 text-light">Login</button>
  
  <div id="error-login" class="alert alert-danger mt-3 rounded-3" style="display: none;" role="alert">
  <i class="bi bi-info-circle me-2"></i> Incorrect Email or Password
  </div>

  <p style="font-size: 12px" class="mt-3">Copyright 2025-2026</p>
</div>


<?php include 'footer_container.php'?> 
<?php include 'footer.php'?> 
<script src="static/js/login.js"></script>
</body>
</html>