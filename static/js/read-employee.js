$(document).ready(function() {
    let currentPage = 1;
    const limit = 6; // Number of items per page

    // Function to load data based on current page
    function loadData(page) {
        const searchTerm = $('#search-input').val();
        const sortType = $('#sortTypeAccount').val();
        const sortOrder = $('#sortOrderAccount').val();

        $.ajax({
            url: '../model/readEmployee.php', // Replace with your PHP endpoint
            method: 'GET',
            data: {
                q: searchTerm,
                page: page,
                sort_type: sortType,
                sort_order: sortOrder
            },
            success: function(response) {
                // Clear existing table rows
                $('#account-table').empty();

                // Check if any data is returned
                if (response.data.length === 0) {
                    $('#account-table').append('<tr><td colspan="5" class="text-center">No results found</td></tr>');
                } else {
                    // Populate table with new data
                    response.data.forEach(item => {
                        $('#account-table').append(`
                            <tr>
                                <td class="pt-4 pb-4">${item.fname} ${item.lname}</td>
                                <td class="pt-4 pb-4">${item.email}</td>
                                <td class="pt-4 pb-4">${item.contact}</td>
                                <td class="pt-4 pb-4">${item.address}</td>
                                <td class="pt-4 pb-4 text-end">
                                    <button class="btn btn-sm btn-outline-dark edit-employee-btn me-2"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#edit-employee"
                                        data-id="${item.id}"
                                        data-fname="${item.fname}"
                                        data-lname="${item.lname}"
                                        data-uname="${item.username}"
                                        data-email="${item.email}"
                                        data-contact="${item.contact}"
                                        data-address="${item.address}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-dark change-password-btn me-2" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#change-password" 
                                        data-id="${item.id}">
                                        <i class="bi bi-key"></i> Change
                                    </button>
                                    <button class="btn btn-sm btn-outline-dark delete-employee-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#delete-employee" 
                                        data-id="${item.id}">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        `);
                    });
                }

                // Ensure pagination exists before accessing total pages
                if (response.pagination) {
                    $('#previous').prop('disabled', page === 1);
                    $('#next').prop('disabled', page >= response.pagination.total_pages);
                    $('#next').data('totalPages', response.pagination.total_pages);
                }

                // Update current page
                currentPage = page;
            }
        });
    }

    // Load data when the page loads
    loadData(currentPage);

    // Handle "Previous" button click
    $('#previous').click(function() {
        if (currentPage > 1) {
            loadData(currentPage - 1);
        }
    });

    // Handle "Next" button click
    $('#next').click(function() {
        if (currentPage < $('#next').data('totalPages')) {
            loadData(currentPage + 1);
        }
    });

    // Handle search input (Click on search button)
    $('#search-btn').click(function() {
        loadData(1); // Reset to page 1 when search is performed
    });

    // Handle "Enter" key press to trigger search
    $('#search-input').keypress(function(event) {
        if (event.which == 13) {  // Enter key pressed
            loadData(1); // Reset to page 1 when search is performed
        }
    });

    // Handle sorting
    $('#sortTypeAccount, #sortOrderAccount').change(function() {
        loadData(1); // Reset to page 1 when sorting options are changed
    });

    // Function to handle the delete button click
    $(document).on('click', '.delete-employee-btn', function() {
        var id = $(this).data('id'); // Get employee ID
        $('#del-id-employee').val(id);
    });

    // Function to handle the edit button click
    $(document).on('click', '.edit-employee-btn', function() {
        var id = $(this).data('id');
        var fname = $(this).data('fname');
        var lname = $(this).data('lname');
        var uname = $(this).data('uname');
        var email = $(this).data('email');
        var contact = $(this).data('contact');
        var address = $(this).data('address');

        // Debugging log
        console.log("Editing Employee ID:", id);

        // Set values in the form
        $('#edit-fname').val(fname);
        $('#edit-lname').val(lname);
        $('#edit-username').val(uname);
        $('#edit-email').val(email);
        $('#edit-contact').val(contact);
        $('#edit-address').val(address);

        // Store ID for update functionality later
        $('#edit-employee-id').val(id);
    });

    // Function to handle the edit button click
    $(document).on('click', '.change-password-btn', function() {
        var id = $(this).data('id');

        // Debugging log
        // console.log("Editing Employee ID:", id);

        // Store ID for update functionality later
        $('#edit-employee-id-update').val(id);
    });
});


function saveEditEmployee() {
    // Collect values from the form fields
    var id = $('#edit-employee-id').val();
    var fname = $('#edit-fname').val();
    var lname = $('#edit-lname').val();
    var username = $('#edit-username').val();
    var email = $('#edit-email').val();
    var contact = $('#edit-contact').val();
    var address = $('#edit-address').val();

    // Send the collected data to the PHP script via AJAX
    $.ajax({
        url: '../model/update_employee.php', // PHP script to update the employee details
        type: 'POST',
        data: {
            id: id,
            fname: fname,
            lname: lname,
            username: username,
            email: email,
            contact: contact,
            address: address
        },
        success: function(response) {
            // Parse the response if it's in JSON format
            var res = JSON.parse(response);
            if (res.success) {
                alert("Employee updated successfully!");
                window.location.reload()
            } else {
                alert("Error updating employee: " + res.message); // Show error message if any
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert("An error occurred while updating the employee.");
        }
    });
}

function saveChangePassword() {
    // Get values from the inputs using jQuery
    var employeeId = $('#edit-employee-id-update').val(); // Get employee ID
    var newPassword = $('#new-password').val(); // New employee password
    var adminPassword = $('#admin-password').val(); // Admin password

    // Reset previous error messages and remove 'is-invalid' class
    $('#new-passwordError').text('');
    $('#admin-passwordError').text('');
    $('#new-password').removeClass('is-invalid');
    $('#admin-password').removeClass('is-invalid');

    // Validate inputs
    if (newPassword === '') {
        $('#new-passwordError').text('New password is required.');
        $('#new-password').addClass('is-invalid');
        return; // Exit the function if validation fails
    }

    if (adminPassword === '') {
        $('#admin-passwordError').text('Admin password is required.');
        $('#admin-password').addClass('is-invalid');
        return; // Exit the function if validation fails
    }

    // Proceed with the rest of the validation and AJAX if validation passes
    $.ajax({
        url: '../model/update-employee-password.php', // The PHP file to process the password change
        type: 'POST',
        data: {
            newPassword: newPassword, // Employee's new password
            adminPassword: adminPassword, // Admin password for verification
            employeeId: employeeId // Employee's ID to update the password for
        },
        success: function(response) {
            // Log the raw response to check the actual data returned
            console.log('Raw response:', response);
        
            try {
                // Attempt to parse the JSON response
                var responseData = JSON.parse(response);
        
                // Handle the PHP response here
                if (responseData.status === 'error') {
                    console.log(responseData.message);
                    alert(responseData.message);
                } else if (responseData.status === 'success') {
                    console.log(responseData.message);
                    alert('Password changed successfully!');
                    window.location.reload()
                } else {
                    console.log('Unexpected response:', response);
                    alert('Unexpected response from the server.');
                }
            } catch (e) {
                console.log('Error parsing JSON:', e);
                alert('There was an issue with the response. Please try again.');
            }
        },
        error: function(xhr, status, error) {
            // Handle AJAX error
            console.log('AJAX Error:', error);
            alert('There was an error processing your request.');
        }
    });
}



