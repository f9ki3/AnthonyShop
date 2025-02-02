$(document).ready(function() {
    let currentPage = 1;
    let searchQuery = '';
    let selectedSortType = 'id';  // Default sort type
    let selectedSortOrder = 'desc'; // Default sort order

    function loadProducts() {
        $.ajax({
            url: '../model/readAdminProducts.php',
            method: 'GET',
            data: {
                page: currentPage,
                q: searchQuery, // Pass search query
                sort_type: selectedSortType, // Send the selected sort type to the backend
                sort_order: selectedSortOrder // Send the selected sort order to the backend
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    let products = response.data;
                    let pagination = response.pagination;
                    let productRows = '';

                    // Set the selected sort type and order in the dropdowns based on response
                    $('#sortTypeProduct').val(response.sort_type || 'id');  // Fallback to 'id' if no sort type is returned
                    $('#sortOrderProduct').val(response.sort_order || 'desc');  // Fallback to 'asc' if no sort order is returned

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
            <td>${product.description.length > 30 ? product.description.substring(0, 30) + '...' : product.description}</td>
            <td>${product.price}</td>
            <td>${product.quantity}</td>
            <td>${product.category}</td>
            <td class="text-end">
                <button onclick="edit_btn(${product.id})" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit-product">
                    <i class="bi bi-pencil"></i> Edit
                </button>
                <button onclick="del_id(${product.id})" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#delete-product">
                    <i class="bi bi-trash"></i> Delete
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

    // Handle Sort type change
    $('#sortTypeProduct').change(function() {
        selectedSortType = $(this).val();
        currentPage = 1;  // Reset to first page on sort change
        loadProducts();
    });

    // Handle Sort order change
    $('#sortOrderProduct').change(function() {
        selectedSortOrder = $(this).val();
        currentPage = 1;  // Reset to first page on sort order change
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


// Edit Modal
function edit_btn(id) {
    $.ajax({
        url: `../model/getProduct.php?id=${id}`, // Endpoint where the delete action will be handled
        type: 'POST', // HTTP method
        data: {
            id: id // Send the product ID as part of the request
        },
        success: function(response) {
            // Extract the product data from the response
            const product = response.data[0]; // Get the first product from the array

            // Store product properties in variables
            const productId = product.id;
            const productName = product.name;
            const productDescription = product.description;
            const productPrice = product.price;
            const productQuantity = product.quantity;
            const productImagePath = product.image_path;
            const productCategory = product.category;
            
            $('#edit-productID').val(productId);
            $('#edit-productPath').val(productImagePath);
            $('#edit-productName').val(productName);
            $('#edit-productDescription').val(productDescription);
            $('#edit-productPrice').val(productPrice);
            $('#edit-productQuantity').val(productQuantity);
            
            // Set the selected category
            $('#edit-productCategory').val(productCategory).change();
        },
        error: function() {
            alert('An error occurred while trying to fetch the product details.');
        }
    });
}
function saveEditProduct() {
    const productID = $('#edit-productID').val();
    const productName = $('#edit-productName').val();
    const productDescription = $('#edit-productDescription').val();
    const productPrice = $('#edit-productPrice').val();
    const productQuantity = $('#edit-productQuantity').val();
    const productCategory = $('#edit-productCategory').val();
    const productImgUpload = $('#edit-productImage')[0].files[0];  // Get the uploaded image file

    // Create a FormData object to send the data, including the image if it exists
    let formData = new FormData();
    formData.append('productID', productID);
    formData.append('productName', productName);
    formData.append('productDescription', productDescription);
    formData.append('productPrice', productPrice);
    formData.append('productQuantity', productQuantity);
    formData.append('productCategory', productCategory);

    // Only append the image if it's selected
    if (productImgUpload) {
        formData.append('productImgUpload', productImgUpload);
    }

    // Send the data via AJAX to the PHP endpoint
    $.ajax({
        url: '../model/editSaveProduct.php', // Your PHP script that handles the update
        type: 'POST',
        data: formData,
        contentType: false, // Let the browser set the content type
        processData: false, // Prevent jQuery from processing the data
        dataType: 'json',
        success: function(response) {
            console.log(response);
            if (response.status === 'success') {
                alert('Product updated successfully!');
                // You can reload the page or update the UI as needed
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function() {
            alert('An error occurred while updating the product.');
        }
    });
}

