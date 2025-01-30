
$(document).ready(function () {
    let currentPage = 1;

    function fetchOrders(page = 1) {
        $.ajax({
            url: `../model/admin_orders.php?page=${page}`,
            method: "GET",
            dataType: "json",
            success: function (response) {
                if (response.data && response.data.length > 0) {
                    currentPage = response.current_page;
                    renderTable(response.data);
                    updatePaginationButtons(response.current_page, response.total_pages);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching orders:", error);
            }
        });
    }

    function renderTable(orders) {
        $("#order-table").empty();

        $.each(orders, function (index, order) {
            let statusColor = getStatusColor(order.status);
            let orderRow = `
            <tr style="border-top: 1px solid gainsboro; cursor: pointer;" class="clickable-row" data-hash="${order.order_hash}">
                <td style="padding: 20px; vertical-align: top;">${order.order_hash}</td>
                <td style="padding: 20px; vertical-align: top;">${order.order_date}</td>
                <td style="padding: 20px; vertical-align: top;">${order.firstname} ${order.lastname}</td>
                <td style="padding: 20px; vertical-align: top;">${order.address}</td>
                <td style="padding: 20px; vertical-align: top;">₱${order.total}</td>
                <td style="padding: 20px; vertical-align: top;">
                <span style="color: ${statusColor}">${order.status}</span>
                </td>
                <td style=" vertical-align: top;">
                <select class="form-control form-control-sm status-select" data-order="${order.order_hash}">
                    <option value="pending" ${order.status === "pending" ? "selected" : ""}>Pending</option>
                    <option value="canceled" ${order.status === "canceled" ? "selected" : ""}>Canceled</option>
                    <option value="accepted" ${order.status === "accepted" ? "selected" : ""}>Accepted</option>
                    <option value="delivery" ${order.status === "delivery" ? "selected" : ""}>Delivery</option>
                    <option value="completed" ${order.status === "completed" ? "selected" : ""}>Completed</option>
                </select>
                </td>
            </tr>
            `;
            $("#order-table").append(orderRow);
        });
    }

    function updatePaginationButtons(current, total) {
        $("#previous").prop("disabled", current <= 1);
        $("#next").prop("disabled", current >= total);
    }

    $("#previous").click(function () {
        if (currentPage > 1) {
            fetchOrders(currentPage - 1);
        }
    });

    $("#next").click(function () {
        fetchOrders(currentPage + 1);
    });

    function getStatusColor(status) {
        switch (status.toLowerCase()) {
            case "pending": return "orange";
            case "accepted": return "blue";
            case "delivery": return "purple";
            case "completed": return "green";
            case "canceled": return "red";
            default: return "black";
        }
    }

    // Handle status change event
    $(document).on("change", ".status-select", function () {
        let selectedStatus = $(this).val();
        let orderHash = $(this).data("order");

        // Send an update request for status change
        $.ajax({
            url: `../model/update_orders.php`,
            method: "POST",
            data: { order_hash: orderHash, status: selectedStatus },
            success: function (response) {
                if (response.success) {
                    // Show success alert
                    alert("Order status updated successfully.");
                    
                    // Refresh the orders table after status update
                    fetchOrders(currentPage);
                } else {
                    // Show error alert
                    alert("Failed to update order status. Please try again.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error updating order status:", error);
                alert("An error occurred while updating the order status.");
            }
        });
    });

    // Make the row clickable, but not when the status is clicked
    $(document).on("click", ".clickable-row", function (e) {
        // Check if the click was inside the status dropdown
        if ($(e.target).closest('.status-select').length === 0) {
            let orderHash = $(this).data("hash");
            window.location.href = `order_view.php?id=${orderHash}`;
        }
    });

    fetchOrders(1); // Load first page on page load
});
