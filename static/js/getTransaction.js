$(document).ready(function() {
    // Get the current URL query string
    const urlParams = new URLSearchParams(window.location.search);
    
    // Get the 'id' parameter from the URL
    const id = urlParams.get('id');
    
    // Make the AJAX request
    $.ajax({
        url: `../model/getTransaction.php?id=${id}`,  // Use backticks for template literals
        method: 'GET',
        contentType: 'application/json',
        success: function(response) {
            response = JSON.parse(response);  // Parse the response if needed
            // Handle the response here
            console.log(response);  // For debugging

            // Dynamically build HTML content for the order info
            const orderInfoHtml = `
                <div class="container mt-4">
                    <div class="row g-3">
                        <h5>Order Information</h5>
                        <!-- Customer Information -->
                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="transaction_code" class="form-label">Transaction Code</label>
                                <input type="text" value="${response.data.order_hash}" id="transaction_code" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="order_date" class="form-label">Date of Order</label>
                                <input type="text" value="${response.data.order_date}" id="order_date" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" value="${response.data.firstname}" id="firstname" class="form-control" disabled>
                            </div>
                            <div class="flex-fill">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" value="${response.data.lastname}" id="lastname" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" value="${response.data.contact}" id="contact" class="form-control" disabled>
                            </div>
                            <div class="flex-fill">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="${response.data.email}" id="email" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="address" class="form-label">Complete Address</label>
                                <input type="text" value="${response.data.address}" id="address" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="d-flex flex-row gap-3">
                            <div class="flex-fill">
                                <label for="address" class="form-label">Grcash Reference no.</label>
                                <input type="text" value="${response.data.gcash_reference}" id="address" class="form-control" disabled>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="col-12">
                            <label class="form-label">Payment Method</label>
                            <div class="d-flex flex-row justify-content-start border rounded p-2">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="payment-method" id="cod" value="cod" ${response.data.payment_type === 'cod' ? 'checked' : ''} disabled>
                                    <label class="form-check-label" for="cod">Cash on Delivery</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment-method" id="gcash" value="gcash" ${response.data.payment_type === 'gcash' ? 'checked' : ''} disabled>
                                    <label class="form-check-label" for="gcash">G-Cash</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Summary -->
                    <div class="d-flex mt-3 justify-content-between">
                        <p class="mb-0">Subtotal</p>
                        <div class="d-flex align-items-center">
                            <span class="text-uppercase fs-5"></span>
                            <p class="mb-0 fs-5" id="sub_total">${response.data.subtotal}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p class="mb-0">Shipping Fee</p>
                        <div class="d-flex align-items-center">
                            <span class="text-uppercase fs-5"></span>
                            <p id="shipping" class="mb-0 fs-5">${response.data.shipping_fee}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <strong class="fs-3">Total</strong>
                        <div class="d-flex align-items-center">
                            <span class="text-uppercase fw-bolder fs-3"></span>
                            <p class="mb-0 fs-3 fw-bolder" id="amount_total">${response.data.total}</p>
                        </div>
                    </div>
                </div>
            `;

            // Append the order info HTML to the DOM
            $('#transaction-div').html(orderInfoHtml);

            // Process the cart items and dynamically add them to the table
            const cartItems = JSON.parse(response.data.cart_items);  // Parse the cart items
            let cartItemsHtml = '';
            cartItems.forEach(item => {
                cartItemsHtml += `
                    <tr style="border-top: 1px solid gainsboro;">
                        <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                            <div style="height: 100px; width: 100px" class="rounded">
                                <img class="rounded" style="object-fit: cover; height: 100%; width: 100%" src="../img/${item.img}" alt="${item.name}">
                            </div>
                        </td>
                        <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                            <p style="padding: 0px; margin: 0px">${item.name}</p>
                            <p style="padding: 0px; margin: 0px">₱ ${item.price}</p>
                        </td>
                        <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                            <p style="padding: 0px; margin: 0px">${item.quantity}</p>
                        </td>
                        <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">₱ ${item.total}</td>
                    </tr>
                `;
            });

            // Append cart items HTML to the transaction table
            $('#transaction-table').html(cartItemsHtml);
            
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);  // Handle errors if any
        }
    });
});


$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    
    $.ajax({
        url: `../model/getTransaction.php?id=${id}`,
        method: 'GET',
        contentType: 'application/json',
        success: function(response) {
            response = JSON.parse(response);
            $('#order_hash').text(response.data.order_hash);
            $('#order_date').text(response.data.order_date);
            $('#customer_name').text(`${response.data.firstname} ${response.data.lastname}`);
            $('#contact').text(response.data.contact);
            $('#email').text(response.data.email);
            $('#address').text(response.data.address);
            $('#payment_type').text(response.data.payment_type === 'gcash' ? 'G-Cash' : 'Cash on Delivery');
            $('#sub_total').text(`₱${response.data.subtotal}`);
            $('#shipping').text(`₱${response.data.shipping_fee}`);
            $('#amount_total').text(`₱${response.data.total}`);
            
            let cartItemsHtml = '';
            JSON.parse(response.data.cart_items).forEach(item => {
                cartItemsHtml += `
                    <tr>
                        <td><img style="height: 100px; width: 100px; object-fit: cover;" src="../img/${item.img}" alt="${item.name}"></td>
                        <td>${item.name}<br>₱${item.price}</td>
                        <td>${item.quantity}</td>
                        <td>₱${item.total}</td>
                    </tr>
                `;
            });
            $('#transaction-table').html(cartItemsHtml);
        },
        error: function(xhr, status, error) {
            console.error("Error:", error);
        }
    });
});