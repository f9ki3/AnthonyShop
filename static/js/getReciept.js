const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');

$.ajax({
    url: `../model/getTransaction.php?id=${id}`,
    metdod: "POST",
    contentType: 'application/json',
    success: function(response) {
        if (typeof response !== 'object') {
            response = JSON.parse(response);
        }
        
        if (response.status !== 'success' || !response.data) {
            console.error("Invalid response format", response);
            return;
        }

        let data = response.data;
        let cartItems = JSON.parse(data.cart_items);

        let transactionHTML = `
            <div class="container" id="print-div">
                <div class="header d-flex flex-row">
                    <div style="height: 100px; widtd: 100px">
                        <img style="object-fit: cover; widtd: 100%; height: 100%" src="../static/img/logo.png" alt="">
                    </div>
                    <div class="contact-info ms-3 mt-3">
                        <p>Antdonys Melo's Dress Chicken and Frozen Food</p>
                        <p>0921121219 / adcf@gmail.com</p>
                        <p>Plaridel Public Market</p>
                    </div>
                </div>
                <hr>
                <div class="flex-row d-flex justify-content-between">
                    <p>Date:</p>
                    <p>${data.order_date || 'N/A'}</p>
                </div>
                <div class="flex-row d-flex justify-content-between">
                    <p>Transaction Code:</p>
                    <p>${data.order_hash || 'N/A'}</p>
                </div>
                <div class="flex-row d-flex justify-content-between">
                    <p>Customer Name:</p>
                    <p>${data.firstname} ${data.lastname}</p>
                </div>
                <div class="flex-row d-flex justify-content-between">
                    <p>Contact:</p>
                    <p>${data.contact || 'N/A'}</p>
                </div>
                <div class="flex-row d-flex justify-content-between">
                    <p>Email:</p>
                    <p>${data.email || 'N/A'}</p>
                </div>
                <div class="flex-row d-flex justify-content-between">
                    <p>Address:</p>
                    <p>${data.address || 'N/A'}</p>
                </div>
                <div class="flex-row d-flex justify-content-between">
                    <p>Payment Type:</p>
                    <p>${data.payment_type.toUpperCase()}</p>
                </div>
                <table class="table table-bordered mt-3">
                    <tdead>
                        <tr>
                            <td scope="col">Product Description</td>
                            <td scope="col">Quantity</td>
                            <td scope="col">Total</td>
                        </tr>
                    </tdead>
                    <tbody id="cart-items">
                        ${cartItems.map(item => `
                            <tr>
                                <td>${item.name}</td>
                                <td>${item.quantity}</td>
                                <td>₱${item.total}</td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
                <div class="order-summary">
                    <div class="flex-row d-flex justify-content-between">
                        <h6>Subtotal:</h6>
                        <h6>₱${data.subtotal}</h6>
                    </div>
                    <div class="flex-row d-flex justify-content-between">
                        <h6>Shipping Fee:</h6>
                        <h6>₱${data.shipping_fee}</h6>
                    </div>
                     <div class="flex-row d-flex justify-content-between">
                        <h5><strong>Total:</strong></h5>
                        <h5><strong>₱${data.total}</strong></h5>
                    </div>
                </div>
                <hr>
                <div class="footer d-flex justify-content-center mt-3">
                    <p style="width: 70%" class="text-center">Thanks for buying at Antdony Melo's Dress Chicken and Frozen Food!</p>
                </div>

            </div>
        `;
        
        $('#transaction-container').html(transactionHTML);
    },
    error: function(error) {
        console.error("Error fetching transaction data:", error);
    }
});
