$(document).ready(function () {
    function fetchInventoryData() {
        $.ajax({
            url: '../model/dashboard-inv.php', // API endpoint
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.least_quantity && response.high_quantity) {
                    // Clear existing list items
                    $("#most-sold-list").empty();
                    $("#least-sold-list").empty();

                    // Append least quantity (low stock) products
                    response.least_quantity.forEach(product => {
                        $("#most-sold-list").append(
                            `<li class="list-group-item d-flex justify-content-between align-items-center">
                                ${product.name}
                                <span class="badge bg-dark">${product.quantity}</span>
                            </li>`
                        );
                    });

                    // Append high quantity (high stock) products
                    response.high_quantity.forEach(product => {
                        $("#least-sold-list").append(
                            `<li class="list-group-item d-flex justify-content-between align-items-center">
                                ${product.name}
                                <span class="badge bg-dark">${product.quantity}</span>
                            </li>`
                        );
                    });
                } else {
                    console.error("Invalid response format");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching inventory data:", error);
            }
        });
    }

    // Fetch inventory data on page load
    fetchInventoryData();
});
