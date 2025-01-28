$(document).ready(function () {
    // Check if an element with id "grocery-8" exists
    const groceryContainer = $("#grocery-8");
    if (groceryContainer.length) {
        console.log("Element with id 'grocery-8' exists.");

        // Fetch data from the endpoint
        $.get("../model/readGrocery.php?limit=8")
            .done(function (response) {
                // Check if the response status is "success"
                if (response.status === "success") {
                    const groceryItems = response.data; // Access the 'data' array

                    // Iterate through the fetched items and append them to #grocery-8
                    groceryItems.forEach((item) => {
                        const groceryHtml = `
                            <div class="col-6 col-md-3">
                                <a href="product.php?id=${item.id}" style="text-decoration: none; color: black">
                                    <div>
                                        <div class="product-img mb-2 rounded">
                                            <img src="../static/img/${item.image_path}" alt="${item.name}" class="rounded img-fluid">
                                        </div>
                                        <div class="product-desc text-start">
                                            <p class="m-0 p-0">${item.name}</p>
                                            <div class="d-flex flex-row justify-content-between">
                                                <h5 class="fw-bold">PHP ${item.price}</h5>
                                                <p>Stock ${item.quantity}</p>
                                            </div>
                                            <button class="btn btn-dark w-100 mb-2">
                                                <i class="bi bi-bag-plus me-2"></i> Buy Now
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>`;
                        groceryContainer.append(groceryHtml);
                    });
                } else {
                    console.error("Failed to fetch grocery items: " + response.status);
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Failed to fetch data from the endpoint.", textStatus, errorThrown);
            });
    } else {
        console.warn("Element with id 'grocery-8' does not exist.");
    }
});
