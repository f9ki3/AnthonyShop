// Function to update the cart badge
function renderCartBadge() {
    // Get the cart from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Count only the number of unique items in the cart (not the quantity)
    let totalItems = cart.length;

    // Get the badge element or create it if it doesn't exist
    let badge = $('#cart-badge');
    if (badge.length === 0) {
        // If the badge doesn't exist, append it to the desired container
        $('#cart-icon-container').append(`
            <span id="cart-badge" class="badge rounded-pill bg-danger" style="display: none;">
                0
                <span class="visually-hidden">cart items</span>
            </span>
        `);
        badge = $('#cart-badge');
    }

    // By default, hide the badge
    badge.hide();

    // Update the badge content
    if (totalItems > 0) {
        badge.text(totalItems > 99 ? "99+" : totalItems);
        badge.show(); // Show the badge if there are items
    }
}

renderCartBadge()