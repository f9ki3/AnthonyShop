$(document).ready(function () {
    // Check if an element with id "chicken-8" exists
    if ($("#chicken-8").length) {
        console.log("Element with id 'chicken-8' exists.");

        // Fetch data from the endpoint
        $.get("../model/readChicken.php?limit=8", function (response) {
            // Parse the JSON response (no need for JSON.parse if jQuery auto-parses it)
            if (response.status === "success") {
                const chickens = response.data; // Access the 'data' array

                // Iterate through the fetched items and append to #chicken-8
                chickens.forEach((chicken) => {
                    const chickenHtml = `
                    <div class="col-6 col-md-3">
                        <a href="product.php?id=${chicken.id}" style="text-decoration: none; color: black">
                            <div >
                                <div class="product-img mb-2 border rounded">
                                    <img src="../static/img/${chicken.image_path}" alt="${chicken.name}" class="rounded img-fluid">
                                </div>
                                <div class="product-desc text-start">
                                    <p class="m-0 p-0">${chicken.name}</p>
                                    <div class="d-flex flex-row justify-content-between">
                                        <h5 class="fw-bold">PHP ${chicken.price}</h5>
                                        <p>Stock ${chicken.quantity}</p>
                                    </div>
                                    <button class="btn btn-dark w-100 mb-2" id="add-to-cart-btn">
                                        <i class="bi bi-bag-plus me-2"></i> Buy Now
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>`;
                    $("#chicken-8").append(chickenHtml);
                });
            } else {
                console.log("Failed to fetch chickens: " + response.status);
            }
        }).fail(function () {
            console.log("Failed to fetch data from the endpoint.");
        });
    } else {
        console.log("Element with id 'chicken-8' does not exist.");
    }
});
