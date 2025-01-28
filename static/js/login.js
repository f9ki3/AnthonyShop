$(document).ready(function () {
    // Button click handler
    $('button').on('click', function (e) {
        e.preventDefault();
        handleLogin();
    });

    // Enter key handler
    $(document).on('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();  // Prevent form submission if Enter is pressed
            $('button').click(); // Trigger button click
        }
    });

    // Function to handle the login process
    function handleLogin() {
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
    }
});
