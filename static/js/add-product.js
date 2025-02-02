$(document).ready(function () {
  // Handle Save button click
  $("#saveProductBtn").click(function () {
    // Get the form values
    const productImage = $("#productImage")[0].files[0];
    const productName = $("#productName").val().trim();
    const productDescription = $("#productDescription").val().trim();
    const productPrice = $("#productPrice").val().trim();
    const productQuantity = $("#productQuantity").val().trim();
    const productCategory = $("#productCategory").val();

    let formIsValid = true;

    // Clear previous error messages
    $(".text-danger").text("");
    $(".form-control, .form-select").removeClass("is-invalid");

    // Validate image file
    if (!productImage) {
      $("#productImageError").text("Product Image is required.");
      $("#productImage").addClass("is-invalid");
      formIsValid = false;
    } else {
      const validExtensions = ["image/jpeg", "image/jpg", "image/png"];
      const maxSize = 3 * 1024 * 1024; // 3MB in bytes

      if (!validExtensions.includes(productImage.type)) {
        $("#productImageError").text("Invalid file type. Only JPEG, JPG, and PNG are allowed.");
        $("#productImage").addClass("is-invalid");
        formIsValid = false;
      }

      if (productImage.size > maxSize) {
        $("#productImageError").text("File size exceeds the 3MB limit.");
        $("#productImage").addClass("is-invalid");
        formIsValid = false;
      }
    }

    // Validate product name
    if (!productName) {
      $("#productNameError").text("Product Name is required.");
      $("#productName").addClass("is-invalid");
      formIsValid = false;
    }

    // Validate description
    if (!productDescription) {
      $("#productDescriptionError").text("Description is required.");
      $("#productDescription").addClass("is-invalid");
      formIsValid = false;
    }

    // Validate price
    if (!productPrice) {
      $("#productPriceError").text("Price is required.");
      $("#productPrice").addClass("is-invalid");
      formIsValid = false;
    }

    // Validate quantity
    if (!productQuantity) {
      $("#productQuantityError").text("Quantity is required.");
      $("#productQuantity").addClass("is-invalid");
      formIsValid = false;
    }

    // Validate category
    if (!productCategory || productCategory === "Choose...") {
      $("#productCategoryError").text("Category is required.");
      $("#productCategory").addClass("is-invalid");
      formIsValid = false;
    }

    // If form is valid, submit via AJAX
    if (formIsValid) {
      let formData = new FormData();
      formData.append("productImage", productImage);
      formData.append("productName", productName);
      formData.append("productDescription", productDescription);
      formData.append("productPrice", productPrice);
      formData.append("productQuantity", productQuantity);
      formData.append("productCategory", productCategory);

      $.ajax({
        url: "../model/insertNewProduct.php", // PHP script to handle the upload
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            alert("Product saved successfully!");
            location.reload(); // Reload the page or update UI
          } else {
            alert("Error: " + response.message);
          }
        },
        error: function () {
          alert("An error occurred while saving the product.");
        },
      });
    }
  });
});
