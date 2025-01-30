$(document).ready(function() {
    let currentPage = 1;
    let searchQuery = '';

    function loadProducts() {
        $.ajax({
            url: '../model/readAdminProducts.php',
            method: 'GET',
            data: {
                page: currentPage,
                q: searchQuery // Pass q as the search query
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    let products = response.data;
                    let pagination = response.pagination;
                    let productRows = '';

                    if (products.length === 0) {
                        productRows = `
                            <tr>
                                <td colspan="7" class="text-center">No results found</td>
                            </tr>
                        `;
                    } else {
                        products.forEach(function(product) {
                            productRows += `
        <tr>
            <td>
                <img src="../static/img/${product.image_path}" alt="${product.name}" class="rounded" width="70" height="60">
            </td>
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.price}</td>
            <td>${product.quantity}</td>
            <td>${product.category}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-dark">
                    <i class="bi bi-pencil"></i> Edit <!-- Pencil icon for edit -->
                </button>
                <button onclick="del_id(${product.id})" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#delete-product">
                    <i class="bi bi-trash"></i> Delete <!-- Trash icon from Bootstrap Icons -->
                </button>
            </td>
        </tr>
    `;

                        });
                    }

                    $('#order-table').html(productRows);

                    // Handle pagination buttons
                    if (pagination.current_page <= 1) {
                        $('#previous').attr('disabled', true);
                    } else {
                        $('#previous').attr('disabled', false);
                    }

                    if (pagination.current_page >= pagination.total_pages) {
                        $('#next').attr('disabled', true);
                    } else {
                        $('#next').attr('disabled', false);
                    }
                }
            }
        });
    }

    // Load products on page load
    loadProducts();

    // Handle Search button click
    $('#search-btn').click(function() {
        searchQuery = $('#search-input').val().trim(); // Ensure there's no extra whitespace
        currentPage = 1; // Reset to first page on search
        loadProducts();
    });

    // Handle Enter key press on search input
    $('#search-input').keypress(function(e) {
        if (e.which === 13) { // 13 is the keycode for Enter
            searchQuery = $(this).val().trim(); // Get the search input value
            currentPage = 1; // Reset to first page on search
            loadProducts();
        }
    });

    // Handle Next button click
    $('#next').click(function() {
        currentPage++;
        loadProducts();
    });

    // Handle Previous button click
    $('#previous').click(function() {
        currentPage--;
        loadProducts();
    });
});


// Delete product

function del_id(id) {
    $('#del-id').val(id); // Set the value of the input field with id="del-id"
    console.log('click now'); // Confirm the function was triggered
}

function delete_yes() {
    const id = $('#del-id').val(); // Get the product ID from the hidden input
    $.ajax({
        url: '../model/delete_product.php', // Endpoint where the delete action will be handled
        type: 'POST', // HTTP method
        data: {
            id: id // Send the product ID as part of the request
        },
        success: function(response) {
            // Handle the server response (e.g., success or failure message)
            if (response === 'success') {
                alert('Product deleted successfully!');
                // Optionally, remove the row from the table or reload the page
                location.reload(); // Reload the page to reflect changes
            } else {
                alert('Failed to delete product.');
            }
        },
        error: function() {
            alert('An error occurred while trying to delete the product.');
        }
    });
}
