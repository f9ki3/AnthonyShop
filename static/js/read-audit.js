$(document).ready(function() {
    let currentPage = 1;
    const limit = 6; // Number of items per page

    // Function to load data based on current page
    function loadData(page) {
        const searchTerm = $('#search-input').val();
        const sortType = $('#sortTypeAccount').val();
        const sortOrder = $('#sortOrderAccount').val();

        $.ajax({
            url: '../model/readAuditlogs.php', // Replace with your PHP endpoint
            method: 'GET',
            data: {
                q: searchTerm,
                page: page,
                sort_type: sortType,
                sort_order: sortOrder
            },
            success: function(response) {
                // Clear existing table rows
                $('#account-table').empty();

                // Check if there is data
                if (response.data.length === 0) {
                    // If no results found, display a message
                    $('#account-table').append(`
                        <tr>
                            <td colspan="3" class="text-center pt-4 pb-4">No results found</td>
                        </tr>
                    `);
                } else {
                    // Populate table with new data
                    response.data.forEach(item => {
                        $('#account-table').append(`
                            <tr>
                                <td class="pt-4 pb-4">${item.action}</td>
                                <td class="pt-4 pb-4">${item.user_agent}</td>
                                <td class="pt-4 pb-4">${item.created_at}</td>
                            </tr>
                        `);
                    });
                }

                // Ensure pagination exists before accessing total pages
                if (response.pagination) {
                    $('#previous').prop('disabled', page === 1);
                    $('#next').prop('disabled', page >= response.pagination.total_pages);
                    $('#next').data('totalPages', response.pagination.total_pages);
                }

                // Update current page
                currentPage = page;
            }
        });
    }

    // Load data when the page loads
    loadData(currentPage);

    // Handle "Previous" button click
    $('#previous').click(function() {
        if (currentPage > 1) {
            loadData(currentPage - 1);
        }
    });

    // Handle "Next" button click
    $('#next').click(function() {
        if (currentPage < $('#next').data('totalPages')) {
            loadData(currentPage + 1);
        }
    });

    // Handle search input click event
    $('#search-btn').click(function() {
        loadData(1); // Reset to page 1 when search is performed
    });

    // Allow search to be triggered by pressing Enter key in the search input
    $('#search-input').keypress(function(e) {
        if (e.which === 13) { // Enter key
            $('#search-btn').click();
        }
    });

    // Handle sorting
    $('#sortTypeAccount, #sortOrderAccount').change(function() {
        loadData(1); // Reset to page 1 when sorting options are changed
    });

});
