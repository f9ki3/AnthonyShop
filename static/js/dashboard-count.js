
$(document).ready(function() {
    // Function to animate the number
    function animateNumber(element, targetValue, duration) {
        $(element).prop('Counter', 0).animate({
            Counter: targetValue
        }, {
            duration: duration,
            easing: 'swing',
            step: function (now) {
                $(this).text("₱ " + Math.ceil(now));
            }
        });
    }

    // Fetch data from the server
    $.ajax({
        url: '../model/dashboard-count.php',
        method: 'GET', // You can adjust the method based on what your API expects (GET/POST)
        success: function(data) {
            // Assuming the API returns a JSON object similar to the sample response
            const responseData = data;
            
            // Animate the sales number (fast then slow animation)
            animateNumber('#todays-sales', responseData.todays_sales, 3000); // 3 seconds for example
            animateNumber('#total-orders', responseData.todays_order_count, 3000);
            animateNumber('#total-customers', responseData.total_customers, 3000);
            animateNumber('#total-products', responseData.total_products, 3000);
        },
        error: function(xhr, status, error) {
            console.error("Error fetching data:", error);
            alert("An error occurred while fetching the data. Please try again later.");
        }
    });
});
