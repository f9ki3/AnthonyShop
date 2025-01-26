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
        $(document).ready(function () {
            // Check if an element with id "frozen-page" exists
            const frozenContainer = $("#frozen-page");
            if (frozenContainer.length) {
                console.log("Element with id 'frozen-page' exists.");
        
                // Fetch data from the endpoint
                $.get("../model/readFrozen.php?limit=8")
                    .done(function (response) {
                        // Check if the response status is "success"
                        if (response.status === "success") {
                            const frozenItems = response.data; // Access the 'data' array
        
                            // Iterate through the fetched items and append them to #frozen-page
                            frozenItems.forEach((item) => {
                                const frozenHtml = `
                                    <div class="col-6 col-md-3">
                                        <div>
                                            <div class="product-img mb-2 rounded">
                                                <img src="${item.image_path}" alt="${item.name}" class="rounded img-fluid">
                                            </div>
                                            <div class="product-desc text-start">
                                                <p class="m-0 p-0">${item.name}</p>
                                                <div class="d-flex flex-row justify-content-between">
                                                    <h5 class="fw-bold">PHP ${item.price}</h5>
                                                    <p>Stock ${item.quantity}</p>
                                                </div>
                                                <button class="btn btn-dark w-100 mb-2">
                                                    <i class="bi bi-bag-plus me-2"></i> Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>`;
                                frozenContainer.append(frozenHtml);
                            });
                        } else {
                            console.error("Failed to fetch frozen items: " + response.status);
                        }
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        console.error("Failed to fetch data from the endpoint.", textStatus, errorThrown);
                    });
            } else {
                console.warn("Element with id 'frozen-page' does not exist.");
            }
        });
        
    });

    }
});