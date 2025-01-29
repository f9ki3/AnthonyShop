$(document).ready(function () {
    $(".btn.bg-red").click(function (e) {
        e.preventDefault(); // Prevent form submission

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
            url: "../model/login_admin.php", // PHP endpoint
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify({ email: email, password: password }),
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    window.location.href = "dashboard.php"; // Redirect on success
                } else {
                    errorDiv.text(response.message).show(); // Show error message
                }
            },
            error: function () {
                errorDiv.text("Something went wrong. Please try again.").show();
            }
        });
    });
});
