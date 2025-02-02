$(document).ready(function() {
    function fetchSalesData() {
        $.ajax({
            url: '../model/dashboard-stats.php', // Change to your API endpoint
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.daily_sales && response.monthly_sales) {
                    // Process daily sales data
                    const dailyCategories = response.daily_sales.map(sale => sale.date);
                    const dailyData = response.daily_sales.map(sale => parseFloat(sale.sales));

                    // Render Daily Sales Chart as Line Graph with Area
                    const dailySalesOptions = {
                        chart: {
                            type: 'area',
                            height: 350,
                            toolbar: { show: false }
                        },
                        series: [{
                            name: 'Daily Sales',
                            data: dailyData
                        }],
                        xaxis: {
                            categories: dailyCategories
                        },
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.2, // Light fill
                                opacityTo: 0,
                                stops: [0, 100]
                            }
                        },
                        dataLabels: { enabled: false },
                        stroke: { 
                            curve: 'smooth',
                            width: 3,
                            colors: ['#000'] // Black line color
                        }
                    };

                    const dailySalesChart = new ApexCharts($("#daily-sales-chart")[0], dailySalesOptions);
                    dailySalesChart.render();

                    // Process monthly sales data
                    const monthlyCategories = response.monthly_sales.map(sale => sale.month);
                    const monthlyData = response.monthly_sales.map(sale => parseFloat(sale.sales));

                    // Render Monthly Sales Chart
                    const monthlySalesOptions = {
                        chart: {
                            type: 'bar',
                            height: 350,
                            toolbar: { show: false }
                        },
                        series: [{
                            name: 'Monthly Sales',
                            data: monthlyData
                        }],
                        xaxis: {
                            categories: monthlyCategories
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '70%',
                                endingShape: 'rounded'
                            }
                        },
                        dataLabels: { enabled: false },
                        fill: { opacity: 1 },
                        colors: ['#000'] // Black bars for monthly sales
                    };

                    const monthlySalesChart = new ApexCharts($("#monthly-sales-chart")[0], monthlySalesOptions);
                    monthlySalesChart.render();
                } else {
                    console.error('Invalid response format');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching sales data:', error);
            }
        });
    }

    // Fetch data when the page loads
    fetchSalesData();
});
