$(document).ready(function() {
    // Function to check if all required fields are filled for the payment method
    function validateFields() {
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var contact = $('#contact').val();
        var email = $('#email').val();
        var address = $('#address').val();
        var payment_method = $('input[name="payment-method"]:checked').val();
        var ref = $('#reference').val();

        var isValid = false;

        // Validate based on the selected payment method
        if (payment_method === 'cod') {
            // All fields must be filled for COD
            if (firstname !== '' && lastname !== '' && contact !== '' && email !== '' && address !== '') {
                isValid = true;
            }
        } else if (payment_method === 'gcash') {
            // All fields must be filled for GCash, including reference
            if (firstname !== '' && lastname !== '' && contact !== '' && email !== '' && address !== '' && ref !== '') {
                isValid = true;
            }
        }

        // Enable or disable the purchase button based on validation
        $('#purchase-btn').prop('disabled', !isValid);
    }

    // Bind input events to the fields to trigger validation in real-time
    $('#firstname, #lastname, #contact, #email, #address, #reference').on('input', function() {
        validateFields();
    });

    // Bind change event to payment method selection
    $('input[name="payment-method"]').on('change', function() {
        validateFields();
    });
});


function place_order(){
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var contact = $('#contact').val();
    var email = $('#email').val();
    var address = $('#address').val();
    var payment_method = $('input[name="payment-method"]:checked').val();
    var ref = $('#reference').val();
    let reference = '';
    var shipping = $('#shipping').text()
    var sub_total = $('#sub_total').text()
    var amount_total = $('#amount_total').text()
    var cart = JSON.parse(localStorage.getItem('cart'))

    if (ref === '') {
        reference = 'None'; // Set reference to 'None' if empty
    } else {
        reference = ref; // Use the value from the input if not empty
    }

    data = {
        fname: firstname,
        lname: lastname,
        contact: contact,
        email: email,
        address: address,
        payment_method: payment_method,
        reference: reference,
        sub_total: sub_total,
        shipping: shipping,
        total: amount_total,
        cart: cart
    }

    console.log(data)
}