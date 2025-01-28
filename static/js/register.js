$(document).ready(function () {
    $('#registrationForm').on('submit', function (e) {
      e.preventDefault();
      let isValid = true;
  
      // Clear previous errors
      $('.form-control').removeClass('is-invalid');
  
      // Validate firstname
      const firstname = $('#firstname').val().trim();
      if (firstname === '') {
        $('#firstname').addClass('is-invalid');
        isValid = false;
      }
  
      // Validate lastname
      const lastname = $('#lastname').val().trim();
      if (lastname === '') {
        $('#lastname').addClass('is-invalid');
        isValid = false;
      }
  
      // Validate email
      const email = $('#email').val().trim();
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email === '' || !emailPattern.test(email)) {
        $('#email').addClass('is-invalid');
        isValid = false;
      }
  
      // Validate contact
      const contact = $('#contact').val().trim();
      if (contact === '') {
        $('#contact').addClass('is-invalid');
        isValid = false;
      }
  
      // Validate address
      const address = $('#address').val().trim();
      if (address === '') {
        $('#address').addClass('is-invalid');
        isValid = false;
      }
  
      // Validate password
      const password = $('#password').val().trim();
      if (password.length < 6) {
        $('#password').addClass('is-invalid');
        isValid = false;
      }
  
      // Validate confirm password
      const confirmPassword = $('#confirm-password').val().trim();
      if (confirmPassword !== password) {
        $('#confirm-password').addClass('is-invalid');
        isValid = false;
      }
  
      // If all fields are valid, submit via AJAX
      if (isValid) {
        const formData = {
          firstname: firstname,
          lastname: lastname,
          email: email,
          contact: contact,
          address: address,
          password: password
        };
  
        // Make an AJAX request
        $.ajax({
          url: 'model/registercustomer.php', // Replace with your PHP endpoint
          type: 'POST',
          data: JSON.stringify(formData), // Send the data as a JSON string
          contentType: 'application/json', // Specify that the data is in JSON format
          success: function (response) {
            window.location.href="register_success.php"
            // Handle the response from PHP here (e.g., redirect, show a success message)
          },
          error: function (xhr, status, error) {
            alert('An error occurred. Please try again later.');
            console.error(error);
          }
        });
      }
    });
  });
  