$(document).ready(function () {
    // Check if an element with id "suggestion" exists
    if ($("#suggestion").length) {
        console.log("Element with id 'suggestion' exists.");

        // Fetch data from the endpoint
        $.get("../model/suggestion.php?limit=8", function (response) {
            // Parse the JSON response (no need for JSON.parse if jQuery auto-parses it)
            if (response.status === "success") {
                const suggestion = response.data; // Access the 'data' array

                // Iterate through the fetched items and append to #suggestion
                suggestion.forEach((suggestion) => {
                    const suggestionHtml = `
                    <div class="col-6 col-md-3">
                        <a href="product.php?id=${suggestion.id}" style="text-decoration: none; color: black">
                            <div>
                                <div class="product-img mb-2 rounded">
                                    <img src="../static/img/${suggestion.image_path}" alt="${suggestion.name}" class="rounded img-fluid">
                                </div>
                                <div class="product-desc text-start">
                                    <p class="m-0 p-0">${suggestion.name}</p>
                                    <div class="d-flex flex-row justify-content-between">
                                        <h5 class="fw-bold">PHP ${suggestion.price}</h5>
                                        <p>Stock ${suggestion.quantity}</p>
                                    </div>
                                    <button class="btn btn-dark w-100 mb-2" id="add-to-cart-btn">
                                        <i class="bi bi-bag-plus me-2"></i> Buy Now
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>`;
                    $("#suggestion").append(suggestionHtml);
                });
            } else {
                console.log("Failed to fetch suggestion: " + response.status);
            }
        }).fail(function () {
            console.log("Failed to fetch data from the endpoint.");
        });
    } else {
        console.log("Element with id 'suggestion' does not exist.");
    }
});
