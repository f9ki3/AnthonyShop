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
                    <td style="padding: 20px; vertical-align: top;">
                        <select class="form-control status-select" data-order="${order.order_hash}">
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

    // Handle status change and update database
    $(document).on("change", ".status-select", function () {
        let selectedStatus = $(this).val();
        let orderHash = $(this).data("order");

        $.ajax({
            url: "../model/admin_orders.php",
            method: "POST",
            data: { order_hash: orderHash, status: selectedStatus },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    console.log(`Order ${orderHash} updated to ${selectedStatus}`);
                } else {
                    console.error("Failed to update status:", response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error updating status:", error);
            }
        });
    });

    fetchOrders(1); // Load first page on page load
});
