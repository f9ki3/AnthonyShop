$(document).ready(function () {
    // Get the current URL
    var urlParams = new URLSearchParams(window.location.search);

    // Check if the URL contains the 'id' parameter
    if (urlParams.has('id')) {
        var idValue = urlParams.get('id');
        $.ajax({
            url: `../model/getProduct.php?id=${idValue}`, // Correctly interpolate idValue into the URL
            type: 'GET', // The request method (GET)
            success: function (response) {
                // Ensure the response is JSON
                if (response.status === "success" && response.data && response.data.length > 0) {
                    var product = response.data[0]; // Access the first product object

                    // Update the product name in the header and details section
                    $('#product-name, #product-name-buttom').text(product.name);

                    // Build the product HTML
                    var productHTML = `
                        <div class="col-12 col-md-6 pt-5">
                            <input id="product-id" type="hidden" value="${product.id}">
                            <div class="border product-image-view rounded-4">
                                <img src="../static/img/${product.image_path}" alt="${product.name}" id="product-image" class="rounded-4 img-fluid">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pt-5">
                            <h1 id="product-name-buttom">${product.name}</h1>
                            <p class="text-justify">${product.description || "No description available."}</p>
                            <h1>PHP ${product.price.toFixed(2)}</h1>
                            <div class="input-group mb-3 mt-3" style="max-width: 100%;">
                                <button class="btn btn-outline-secondary" style="width: 20%" type="button" id="decrement">-</button>
                                <input type="number" class="form-control text-center" id="quantity" value="1" min="1" max="${product.quantity}" style="width: 50px;">
                                <button class="btn btn-outline-secondary" style="width: 20%" type="button" id="increment">+</button>
                            </div>
                            <button class="btn btn-dark btn-add w-100">Add to Cart</button>
                            <p class="mt-2 text-muted" id="stocks">Available stock: ${product.quantity}</p>
                        </div>
                    `;

                    // Append the content to the product container
                    $('#product-container').html(productHTML);

                    // Add functionality for the quantity buttons
                    $('#increment').on('click', function () {
                        let quantityInput = $('#quantity');
                        let currentValue = parseInt(quantityInput.val());
                        if (currentValue < product.quantity) {
                            quantityInput.val(currentValue + 1);
                        }
                    });

                    $('#decrement').on('click', function () {
                        let quantityInput = $('#quantity');
                        let currentValue = parseInt(quantityInput.val());
                        if (currentValue > 1) {
                            quantityInput.val(currentValue - 1);
                        }
                    });

                    // Add validation for manual input
                    $('#quantity').on('change', function () {
                        let quantityInput = $(this);
                        let currentValue = parseInt(quantityInput.val());
                    
                        // If the input is empty, set it to 1
                        if (!quantityInput.val().trim()) {
                            quantityInput.val(1);
                            return;
                        }
                    
                        // Reset to 1 if below the minimum
                        if (currentValue < 1) {
                            quantityInput.val(1);
                        }
                    
                        // Reset to max stock if above the limit
                        if (currentValue > product.quantity) {
                            quantityInput.val(product.quantity);
                        }
                    });
                    
                } else {
                    console.error('Product data not found or invalid response format:', response);
                }
            },
            error: function (xhr, status, error) {
                // Handle any errors that occur during the request
                console.error('Error:', status, error);
            }
        });
    } else {
        // Redirect to home if no ID is found in the URL
        window.location.href = 'home.php';
    }
});
