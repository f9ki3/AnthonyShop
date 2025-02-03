$(document).ready(function() {
    // Make an AJAX request to your PHP endpoint
    $.ajax({
        url: '../model/report-daily.php', // Replace with the actual URL of your PHP file
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Generate the HTML content using the fetched data
            const dailyReportHTML = `
                <div>
                    <div class="header d-flex flex-row">
                        <div style="height: 100px; width: 100px">
                            <img style="object-fit: cover; width: 100%; height: 100%" src="../static/img/logo.png" alt="">
                        </div>
                        <div class="contact-info ms-3 mt-3">
                            <p style="padding: 0; margin:0">Antdonys Melo's Dress Chicken and Frozen Food</p>
                            <p style="padding: 0; margin:0">0921121219 / adcf@gmail.com</p>
                            <p style="padding: 0; margin:0">Plaridel Public Market</p>
                        </div>
                    </div>
                    <hr>
                    <h4>Daily Sales Report</h4>
                    <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
                        <p style="padding: 0; margin: 0">Date:</p>
                        <p style="padding: 0; margin: 0">${data.order_date || 'N/A'}</p>
                    </div>
                    <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
                        <p style="padding: 0; margin: 0">Total Orders</p>
                        <p style="padding: 0; margin: 0">${data['total orders'] || 'N/A'}</p>
                    </div>
                    <div class="flex-row d-flex justify-content-between" style="padding: 0; margin: 0">
                        <p style="padding: 0; margin: 0">Total Revenue</p>
                        <p style="padding: 0; margin: 0">₱${data['today revenue'] || 'N/A'}</p>
                    </div>

                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <td scope="col">Custome Name</td>
                                <td scope="col">Total Amount</td>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            ${data.list.map(item => `
                                <tr>
                                    <td>${item.name}</td>
                                    <td>₱${item.total_amount}</td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            `;

            // Append the generated HTML to a parent element
            $('#print-daily-sales').append(dailyReportHTML); // Replace #parent-element-id with the appropriate parent container's ID
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed: " + status + ", " + error);
        }
    });
});
