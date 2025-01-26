$(document).ready(function() {
    // Get the current page URL
    var currentUrl = window.location.href;

    // Check if the URL has any query parameters
    if (currentUrl.includes('?')) {
        console.log('URL has query parameters');
    } else {
        console.log('URL does not have query parameters');
        $(document).ready(function () {
        // Check if an element with id "chicken-page" exists
        if ($("#chicken-page").length) {
            console.log("Element with id 'chicken-page' exists.");

            // Fetch data from the endpoint
            $.get("../model/readChicken.php", function (response) {
                // Parse the JSON response (no need for JSON.parse if jQuery auto-parses it)
                if (response.status === "success") {
                    const chickens = response.data; // Access the 'data' array

                    // Iterate through the fetched items and append to #chicken-page
                    chickens.forEach((chicken) => {
                        const chickenHtml = `
                        <div class="col-6 col-md-3">
                            <a href="product.php?id=${chicken.id}" style="text-decoration: none; color: black">
                                <div>
                                    <div class="product-img mb-2 rounded">
                                        <img src="${chicken.image_path}" alt="${chicken.name}" class="rounded img-fluid">
                                    </div>
                                    <div class="product-desc text-start">
                                        <p class="m-0 p-0">${chicken.name}</p>
                                        <div class="d-flex flex-row justify-content-between">
                                            <h5 class="fw-bold">PHP ${chicken.price}</h5>
                                            <p>Stock ${chicken.quantity}</p>
                                        </div>
                                        <button class="btn btn-dark w-100 mb-2">
                                            <i class="bi bi-bag-plus me-2"></i> Buy Now
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>`;
                        $("#chicken-page").append(chickenHtml);
                    });
                } else {
                    console.log("Failed to fetch chickens: " + response.status);
                }
            }).fail(function () {
                console.log("Failed to fetch data from the endpoint.");
            });
        } else {
            console.log("Element with id 'chicken-page' does not exist.");
        }
    });

    }
});