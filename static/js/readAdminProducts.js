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
                                    <td>
                                        <button class="btn btn-sm btn-outline-dark">
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
