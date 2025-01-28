let page = 1; // Initialize the current page

function fetchOrders() {
    $.ajax({
        url: `../model/readOrders.php?page=${page}`, // Pass the current page as a query parameter
        method: 'GET',
        contentType: 'application/json',
        success: function (response) {
            console.log(response);

            if (response.data && response.data.length > 0) {
                let orderTable = document.getElementById('order-table'); // Target the table body

                // Clear existing table rows
                orderTable.innerHTML = '';

                // Loop through the response data and append rows dynamically
                response.data.forEach(order => {
                    let row = `
                        <tr style="border-top: 1px solid gainsboro;">
                            <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                                ${order.order_hash} <!-- Order Code -->
                            </td>
                            <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                                ${order.order_date} <!-- Order Date -->
                            </td>
                            <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                                ${order.firstname} ${order.lastname} <!-- Account Name -->
                            </td>
                            <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                                ${order.address} <!-- Address -->
                            </td>
                            <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                                ₱${order.total} <!-- Total -->
                            </td>
                            <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                                <span style="color: ${getStatusColor(order.status)}">${order.status}</span> <!-- Status with color coding -->
                            </td>
                            <td style="padding-top: 20px; padding-bottom: 20px; vertical-align: top;">
                                 ${order.status === 'pending' ? `<a href="../model/cancel.php?id=${order.order_hash}">Cancel</a>` : ''}
                            </td>
                        </tr>
                    `;

                    // Function to return the appropriate color based on the order status
                    function getStatusColor(status) {
                        switch(status) {
                            case 'pending':
                                return 'orange';
                            case 'accepted':
                                return 'blue';
                            case 'delivery':
                                return 'yellow';
                            case 'completed':
                                return 'green';
                            case 'canceled':
                                return 'red';
                            default:
                                return 'black'; // Default color if status is unrecognized
                        }
                    }


                    // Append the row to the table
                    orderTable.innerHTML += row;
                });

                // Dynamically set totalPages from the response
                const totalPages = response.total_pages;

                // Enable/disable pagination buttons based on the current page and totalPages
                document.getElementById('previous').disabled = page <= 1;
                document.getElementById('next').disabled = page >= totalPages;
            } else {
                console.warn("No data available");
                document.getElementById('order-table').innerHTML = `
                    <tr>
                        <td colspan="6" style="text-align: center;">No orders found.</td>
                    </tr>`;
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error); // Handle errors
        }
    });
}

// Event listeners for pagination buttons
document.getElementById('previous').addEventListener('click', () => {
    if (page > 1) {
        page--; // Decrement the page
        fetchOrders(); // Fetch the updated orders
    }
});

document.getElementById('next').addEventListener('click', () => {
    // Dynamically set totalPages from the response
    const totalPages = 4; // Set this based on the response you get, e.g., response.total_pages

    if (page < totalPages) {
        page++; // Increment the page
        fetchOrders(); // Fetch the updated orders
    }
});

// Initial fetch on page load
fetchOrders();
