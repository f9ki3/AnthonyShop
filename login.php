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
    <img style="height: 100px;" src="../ADCF/static/img/logo.png" alt="">
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
<script>
  $(document).ready(function () {
    $('button').on('click', function (e) {
        e.preventDefault();
        
        // Clear previous error messages
        $('#error-login').hide();
        
        // Get email/username and password values
        const email = $('#floatingEmail').val().trim();
        const password = $('#floatingPassword').val().trim();
        
        let isValid = true;
        
        // Validate email or username
        if (email === '') {
            $('#floatingEmail').addClass('is-invalid');
            isValid = false;
        } else {
            $('#floatingEmail').removeClass('is-invalid');
        }
        
        // Validate password
        if (password === '') {
            $('#floatingPassword').addClass('is-invalid');
            isValid = false;
        } else {
            $('#floatingPassword').removeClass('is-invalid');
        }
        
        // If validation passes
        if (isValid) {
            // Simulate an AJAX login request (replace with your actual endpoint logic)
            $.ajax({
                url: 'model/login.php',  // PHP endpoint
                method: 'POST',
                contentType: 'application/json',  // Send data as JSON
                data: JSON.stringify({
                    email: email,
                    password: password
                }),
                success: function(response) {
                    console.log(response); // This will log the response for debugging
                    response = JSON.parse(response)
                    if (response.success === true) {
                        console.log('Redirecting to dashboard'); // Add a log here to confirm the redirect is happening
                        window.location.href = 'customer/home.php'; // Redirect to dashboard or homepage
                    } else {
                        $('#error-login').text(response.message).show(); // Show the error message if login fails
                    }
                },

                error: function() {
                    // Show error message if AJAX request fails
                    $('#error-login').text('An error occurred. Please try again later.').show();
                }
            });
        } else {
            // Show the error message for validation failures
            $('#error-login').text('Please fill in both fields').show();
        }
    });
});


</script>
</body>
</html>