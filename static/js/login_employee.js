$(document).ready(function () {
    // Handle the button click event
    $(".btn.bg-red").click(function (e) {
        e.preventDefault(); // Prevent form submission

        handleLogin(); // Call the login function
    });

    // Handle the Enter key press in email or password fields
    $("#floatingEmail, #floatingPassword").keydown(function (e) {
        if (e.key === "Enter") { // Check if Enter key is pressed
            e.preventDefault(); // Prevent form submission
            handleLogin(); // Call the login function
        }
    });

    // Function to handle login process
    function handleLogin() {
        let email = $("#floatingEmail").val().trim();
        let password = $("#floatingPassword").val().trim();
        let errorDiv = $("#error-login");

        // Simple validation
        if (email === "" || password === "") {
            errorDiv.text("Email and password are required").show();
            return;
        }

        // Send AJAX request
        $.ajax({
            url: "../model/login_employee.php", // PHP endpoint
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({ email: email, password: password }),
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    window.location.href = "orders.php"; // Redirect on success
                } else {
                    errorDiv.text(response.message).show(); // Show error message
                }
            },
            error: function () {
                errorDiv.text("Something went wrong. Please try again.").show();
            }
        });
    }
});
