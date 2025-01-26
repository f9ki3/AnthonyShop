$(document).ready(function () {
    const SHIPPING_FEE = 120; // Define the shipping fee

    // Function to fetch cart from localStorage
    function getCartFromLocalStorage() {
        return JSON.parse(localStorage.getItem('cart')) || [];
    }

    // Function to update quantity and total
    function updateQuantity(index, newQuantity) {
        let cart = getCartFromLocalStorage(); // Fetch cart data

        // Ensure quantity is within a valid range
        if (newQuantity < 1) {
            newQuantity = 1; // Set to minimum if less than 1
        } else if (newQuantity > cart[index].stocks) {
            newQuantity = cart[index].stocks; // Set to max stock if greater than available stock
        }

        // Update the item quantity and total
        cart[index].quantity = newQuantity;
        cart[index].total = (cart[index].quantity * cart[index].price).toFixed(2);

        // Update the cart in localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        renderCartTable(); // Re-render the table with updated cart
    }

    // Function to calculate totals and update DOM
    function calculateTotals(cart) {
        let subTotal = cart.reduce((acc, item) => acc + item.price * item.quantity, 0); // Total without shipping
        let totalWithShipping = subTotal + SHIPPING_FEE; // Total with shipping

        // Update totals in the DOM
        $('#sub_total').text(`PHP ${subTotal.toFixed(2)}`);
        $('#amount_total').text(`PHP ${totalWithShipping.toFixed(2)}`);
    }

    // Function to render the cart table
    function renderCartTable() {
        let cart = getCartFromLocalStorage(); // Fetch the cart every time rendering

        // Get the tbody where cart items will be added
        let cartTable = $('#cart-table');

        // Clear any existing rows
        cartTable.empty();

        // Check if the cart is empty
        if (cart.length === 0) {
            cartTable.append(`
                <tr>
                    <td colspan="6" class="text-center">
                        <img src="../static/img/cart_empty.svg" alt="Cart Empty" style="width: 500px; height: auto; opacity: 90%">
                        <p class="mt-5 mb-5">Your cart is empty. Add some items!</p>
                    </td>
                </tr>
            `);
            $('#delivery-div').css('display', 'none'); // Hide delivery div when cart is empty
            $('#sub_total').text('PHP 0.00');
            $('#amount_total').text('PHP 0.00');
            return;
        }

        // Show the delivery div when there are items in the cart
        $('#delivery-div').css('display', 'block');

        // Loop through each cart item and create a row
        cart.forEach((item, index) => {
            let row = `
                <tr style="border-top: 1px solid gainsboro;">
                    <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                        <div style="height: 100px; width: 100px" class="rounded">
                            <img class="rounded" style="object-fit: cover; height: 100%; width: 100%" src="${item.img}" alt="${item.name}">
                        </div>
                    </td>
                    <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                        <p style="padding: 0px; margin: 0px">${item.name}</p>
                        <p style="padding: 0px; margin: 0px">PHP ${item.price.toFixed(2)}</p>
                        <p style="padding: 0px; margin: 0px" class="text-success">Available: ${item.stocks}</p>
                    </td>
                    <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                        <div class="input-group" style="max-width: 150px;">
                            <button class="btn btn-outline-secondary decrement" type="button" data-index="${index}">-</button>
                            <input type="number" class="form-control text-center" id="quantity-${index}" value="${item.quantity}" min="1" max="${item.stocks}" style="width: 50px;">
                            <button class="btn btn-outline-secondary increment" type="button" data-index="${index}">+</button>
                        </div>
                    </td>
                    <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">PHP ${(item.price * item.quantity).toFixed(2)}</td>
                    <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                        <button class="btn btn-outline-danger btn-sm remove-item" data-index="${index}"> <i class="bi bi-trash3 me-1"></i>Remove</button>
                    </td>
                </tr>
            `;
            cartTable.append(row);
        });

        // Calculate totals after rendering the cart
        calculateTotals(cart);
    }

    // Initial render of the cart table
    renderCartTable();

    // Handle remove item
    $(document).on('click', '.remove-item', function () {
        let index = $(this).data('index');
        let cart = getCartFromLocalStorage(); // Fetch cart data

        // Remove the item from the cart array
        cart.splice(index, 1);

        // Update the cart in localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        renderCartTable(); // Re-render the table with updated cart
    });

    // Handle increment
    $(document).on('click', '.increment', function () {
        let index = $(this).data('index');
        let cart = getCartFromLocalStorage(); // Fetch cart data

        // Increment quantity and update
        updateQuantity(index, cart[index].quantity + 1);
    });

    // Handle decrement
    $(document).on('click', '.decrement', function () {
        let index = $(this).data('index');
        let cart = getCartFromLocalStorage(); // Fetch cart data

        // Decrement quantity and update
        updateQuantity(index, cart[index].quantity - 1);
    });

    // Handle manual quantity input change
    $(document).on('input', '.form-control', function () {
        let index = $(this).data('index'); // Get the index of the current row
        let inputValue = $(this).val();

        // Update quantity based on input value
        updateQuantity(index, parseInt(inputValue));
    });
});
