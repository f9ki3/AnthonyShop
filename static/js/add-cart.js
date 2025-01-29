$(document).ready(function () {
    // Add to Cart functionality
    $(document).on('click', '.btn-add', function () {
        // Get the product details
        let productName = $('#product-name-buttom').text(); // Product name
        let quantity = parseInt($('#quantity').val()); // Quantity
        let price = parseFloat($('h1:contains("PHP")').text().replace('PHP', '').trim()); // Price
        let imgPath = $('#product-image').attr('src'); // Image path (assuming there's an image with id="product-image")
        let stocks = parseInt($('#stocks').text().replace(/\D/g, '')); // Removes all non-digit characters
        let id = $('#product-id').val()
        
        // Create an object for the product
        let product = {
            name: productName,
            quantity: quantity,
            price: price,
            total: (quantity * price).toFixed(2), // Calculate total price
            img: imgPath, // Add image path to the product object,
            stocks: stocks,
            id: id
        };

        // Check if there's an existing cart in localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Check if the product already exists in the cart
        let existingProductIndex = cart.findIndex(item => item.name === product.name);

        if (existingProductIndex !== -1) {
            // If the product exists, update the quantity and total price
            cart[existingProductIndex].quantity += product.quantity;
            cart[existingProductIndex].total = (cart[existingProductIndex].quantity * cart[existingProductIndex].price).toFixed(2);
        } else {
            // If the product doesn't exist, add it to the cart
            cart.push(product);
        }

        // Store the updated cart back in localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Notify the user
        alert(`${product.name} added to cart!`);

        // Call renderCartBadge to update the cart badge
        renderCartBadge();
    });

    // Initial render of the cart badge
    renderCartBadge();
});
