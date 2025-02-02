$(document).ready(function () {
    $("#saveAccountBtn").click(function () {
        let fname = $("#fname").val().trim();
        let lname = $("#lname").val().trim();
        let email = $("#email").val().trim();
        let contact = $("#contact").val().trim();
        let address = $("#address").val().trim();
        let password = $("#password").val().trim();

        // Clear previous errors and remove is-invalid class
        $(".text-danger").text("");
        $(".form-control").removeClass("is-invalid");

        let hasError = false;

        function validateField(inputId, errorId, errorMessage) {
            let value = $(inputId).val().trim();
            if (value === "") {
                $(errorId).text(errorMessage);
                $(inputId).addClass("is-invalid");
                hasError = true;
            }
        }

        function validateEmail(email) {
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailPattern.test(email);
        }

        function validateContact(contact) {
            let contactPattern = /^[0-9]{10,11}$/; // Accepts 10 or 11 digits
            return contactPattern.test(contact);
        }

        function validatePassword(password) {
            return password.length >= 6; // Ensures password is at least 6 characters long
        }

        validateField("#fname", "#fnameError", "First name is required.");
        validateField("#lname", "#lnameError", "Last name is required.");
        validateField("#email", "#emailError", "Email is required.");
        validateField("#contact", "#contactError", "Contact number is required.");
        validateField("#address", "#addressError", "Address is required.");
        validateField("#password", "#passwordError", "Password is required.");

        if (email !== "" && !validateEmail(email)) {
            $("#emailError").text("Please enter a valid email address.");
            $("#email").addClass("is-invalid");
            hasError = true;
        }

        if (contact !== "" && !validateContact(contact)) {
            $("#contactError").text("Please enter a valid contact number (11 digits).");
            $("#contact").addClass("is-invalid");
            hasError = true;
        }

        if (password !== "" && !validatePassword(password)) {
            $("#passwordError").text("Password must be at least 6 characters long.");
            $("#password").addClass("is-invalid");
            hasError = true;
        }

        if (!hasError) {
            let accountData = {
                fname: fname,
                lname: lname,
                email: email,
                contact: contact,
                address: address,
                password: password
            };

            console.log("Collected Data:", accountData);

            // Example: Send data to server via AJAX
            $.ajax({
                url: "../model/create_employee.php", // Change to your actual backend URL
                type: "POST",
                data: accountData,
                success: function (response) {
                    alert("Account successfully created!");
                    $("#accountForm")[0].reset(); // Reset form after successful submission
                    $(".form-control").removeClass("is-invalid"); // Remove validation classes
                    $("#add-account").modal("hide"); // Close modal
                },
                error: function (xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            });
        }
    });

    // Remove is-invalid when user starts typing
    $(".form-control").on("input", function () {
        if ($(this).val().trim() !== "") {
            $(this).removeClass("is-invalid");
            $(this).siblings(".text-danger").text("");
        }
    });
});
