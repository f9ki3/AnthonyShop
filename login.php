<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
<?php include 'header.php'?> 
<div class="container mt-5" style="max-width: 300px; margin: 0 auto;">
  <div>
    <img style="height: 100px;" src="../ADCF/static/img/logo.png" alt="">
  </div>
  <div>
  
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
  
</div>


<?php include 'footer.php'?> 
</body>
</html>