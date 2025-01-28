$(document).ready(function () {
    // Check if an element with id "search-results" exists
    const $searchResults = $("#search-results");
    if ($searchResults.length) {
        console.log("Element with id 'search-results' exists.");

        // Extract the 'q' parameter from the current page's URL
        const params = new URLSearchParams(window.location.search);
        const query = params.get('q') || ''; // Default to an empty string if 'q' is not present

        $('#input_search').val(query)
        $('#words').text(query)

        // Fetch data from the endpoint with the 'q' parameter
        $.getJSON(`../model/search.php?q=${encodeURIComponent(query)}`, function (response) {
            // Check if the response status is "success"
            if (response.status === "success") {
                const results = response.data; // Access the 'data' array

                // Check if the results array is not empty
                if (results.length > 0) {
                    // Iterate through the fetched items and append to #search-results
                    results.forEach((result) => {
                        const resultHtml = `
                        <div class="col-6 col-md-3">
                            <a href="product.php?id=${result.id}" class="text-decoration-none text-dark">
                                <div>
                                    <div class="product-img mb-2 rounded">
                                        <img src="../static/img/${result.image_path}" alt="${result.name}" class="rounded img-fluid">
                                    </div>
                                    <div class="product-desc text-start">
                                        <p class="m-0 p-0">${result.name}</p>
                                        <div class="d-flex flex-row justify-content-between">
                                            <h5 class="fw-bold">PHP ${result.price}</h5>
                                            <p>Stock ${result.quantity}</p>
                                        </div>
                                        <button class="btn btn-dark w-100 mb-2 add-to-cart-btn">
                                            <i class="bi bi-bag-plus me-2"></i> Buy Now
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>`;
                        $searchResults.append(resultHtml);
                    });
                } else {
                    // Show message when no results are found
                    $searchResults.append('<p>No Results found</p>');
                }
            } else {
                console.log("Failed to fetch results: " + response.status);
            }
        }).fail(function () {
            console.log("Failed to fetch data from the endpoint.");
        });
    } else {
        console.log("Element with id 'search-results' does not exist.");
    }
});
