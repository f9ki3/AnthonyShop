// Hide and show States

$(document).ready(function () {
    console.log("jQuery is ready!");

    // Handle Edit Profile Button
    $("#edit-profile").click(function () {
      console.log("Edit Profile button clicked");

      // Show Edit Profile section and hide Change Password section
      $("#edit-profile-div").fadeIn();
      $("#change-password-div").hide();

      // Enable all profile input fields
      $("#edit-profile-div input").prop("disabled", false);

      // Show Save and Cancel buttons for profile edit
      $("#edit-save-div").fadeIn();

      // Hide Save and Cancel buttons for password change
      $("#password-save").fadeOut();
    });

    // Handle Cancel Edit Button
    $("#cancel-edit").click(function () {
      console.log("Cancel Edit button clicked");

      // Disable all profile input fields
      $("#edit-profile-div input").prop("disabled", true);

      // Hide Save and Cancel buttons
      $("#edit-save-div").fadeOut();
    });

    // Handle Change Password Button
    $("#edit-password").click(function () {
      console.log("Change Password button clicked");

      // Show Change Password section and hide Edit Profile section
      $("#change-password-div").show();
      $("#edit-profile-div").hide();

      // Enable all password input fields
      $("#change-password-div input").prop("disabled", false);

      // Show Save and Cancel buttons for password change
      $("#password-save").fadeIn();

      // Hide Save and Cancel buttons for profile edit
      $("#edit-save-div").fadeOut();
    });

    // Handle Cancel Password Change
    $("#password-cancel").click(function () {
      console.log("Cancel Password Change clicked");

      // Hide Change Password section
      $("#change-password-div").hide();
      $("#edit-profile-div").show();

      // Disable password input fields
      $("#change-password-div input").prop("disabled", true);

      // Hide Save and Cancel buttons for password change
      $("#password-save").fadeOut();
    });
  });

// valdation for save profile
  document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll("#edit-profile-div input");
    const saveButton = document.getElementById("save-profile");

    function checkInputs() {
        let isEmpty = false;
        inputs.forEach(input => {
            if (input.value.trim() === "") {
                isEmpty = true;
            }
        });
        saveButton.disabled = isEmpty;
    }

    // Enable input fields when editing
    document.getElementById("edit-profile-div").addEventListener("input", checkInputs);

    // Call once to disable save button initially
    checkInputs();
});


// Validation for save password
$(document).ready(function() {
    const passwordFields = ['#current-password', '#new-password', '#confirm-password'];
    const errorMessages = {
      '#current-password': 'Current password is required.',
      '#new-password': 'New password is required.',
      '#confirm-password': 'Confirm password is required and must match the new password.',
    };

    // Function to check if fields are filled and valid
    function validateFields() {
      let isValid = true;

      passwordFields.forEach(function(field) {
        const $field = $(field);
        const errorId = `#${field.substring(1)}-error`;

        // Check if the field is empty
        if ($field.val() === '') {
          $field.addClass('is-invalid');
          $(errorId).text(errorMessages[field]).show();
          isValid = false;
        } else {
          $field.removeClass('is-invalid');
          $(errorId).hide();
        }
      });

      // Ensure the new password and confirm password match
      if ($('#new-password').val() !== $('#confirm-password').val()) {
        $('#confirm-password').addClass('is-invalid');
        $('#confirm-password-error').text('Confirm password must match the new password.').show();
        isValid = false;
      }

      return isValid;
    }

    // Enable or disable Save button based on field validation
    function toggleSaveButton() {
      $('#save-change-password').prop('disabled', !validateFields());
    }

    // Event listeners for input fields
    passwordFields.forEach(function(field) {
      $(field).on('input', function() {
        toggleSaveButton();
      });
    });

    // Save button click handler
    $('#save-change-password').on('click', function() {
      if (validateFields()) {
        let password = $('#current-password').val()
        let new_password = $('#new-password').val()

        // Prepare the data to send to the PHP script
        var data = {
          password: password,      // Current password
          new_password: new_password // New password
        };

        $.ajax({
          url: '../model/update_password.php',  // PHP script to update the password
          method: 'POST',
          data: JSON.stringify(data),          // Send data as JSON
          contentType: 'application/json',
          success: function(response){
            // Log the response to the console (for debugging)
            console.log(response);

            // Parse the response if it's a JSON string
            var responseObj = JSON.parse(response);

            // Check if the response contains a success or error message
            if (responseObj.success) {
              // Show success message in an alert
              alert(responseObj.success);

              // Reload the page after successful update
              location.reload();
            } else if (responseObj.error) {
              // Show error message in an alert
              alert(responseObj.error);
            }
          },
          error: function(error) {
            console.log('Error:', error);
            alert('An error occurred while updating the password!');
          }
        });

      }
    });

    // Initial validation check
    toggleSaveButton();
  });


// Save the profile information to database
function save_profile() {
    // Get the values from the input fields
    var fname = $('#firstname').val();
    var lname = $('#lastname').val();
    var contact = $('#contact').val();
    var email = $('#email').val();
    var address = $('#address').val();
  
    // Here you can add AJAX to send data to your server for saving
    // Example using jQuery AJAX:
    $.ajax({
      url: '../model/update_profile.php',  // Your PHP script for saving the profile
      type: 'POST',
    //   contentType: 'application/json',
      data: {
        fname: fname,
        lname: lname,
        contact: contact,
        email: email,
        address: address
      },
      success: function(response) {
        // Handle the response after saving (e.g., show a success message)
        alert('Profile saved successfully!');
        console.log(response)
      },
      error: function(error) {
        // Handle errors (e.g., show an error message)
        alert('Error saving profile!');
      }
    });
  }
  
