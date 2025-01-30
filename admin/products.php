<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <?php include 'header.php';?>    

    <!-- Include ApexCharts library -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Include jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <body>
    <div class="d-flex flex-row">
      <?php include 'navbar.php'; ?>
      <div class="d-flex flex-column flex-grow-1">

        <div class="container g-3 p-3">
          <div id="cart-table-div" class="col-12">
            <div class="row">
              <div class="col-12 col-md-6">
                 <h3>Products</h3>
              </div>
              <div class="col-12 col-md-6 d-flex align-items-center gap-2">
                  <div class="input-group flex-grow-1">
                      <input type="text" id="search-input" placeholder="Search product" class="form-control">
                      <button class="btn border btn-dark" id="search-btn">
                          <i class="bi bi-search"></i> <!-- Search icon from Bootstrap Icons -->
                          Search
                      </button>
                  </div>
                  <div>
                      <button class="d-flex btn btn-dark" data-bs-toggle="modal" data-bs-target="#add-product">
                          <i class="bi bi-plus"></i> <!-- Plus icon from Bootstrap Icons -->
                          Create
                      </button>
                  </div>
              </div>

            </div>

            <table class="table table-hover mt-3">
              <thead>
                <tr>
                  <th scope="col" style="width: 10%;">Image</th>
                  <th scope="col" style="width: 20%;">Product Name</th>
                  <th scope="col" style="width: 20%;">Description</th>
                  <th scope="col" style="width: 10%;">Price</th>
                  <th scope="col" style="width: 10%;">QTY</th>
                  <th scope="col" style="width: 10%;">Category</th>
                  <th scope="col" style="width: 10%;">Action</th>
                </tr>
              </thead>
              <tbody id="order-table">
                <!-- Dynamically populated rows will go here -->
              </tbody>
            </table>

            <div>
              <button id="previous" class="btn btn-outline-dark" disabled>Previous</button>
              <button id="next" class="btn btn-outline-dark">Next</button>
            </div>
          </div>
        </div>
      </div>
    </div>






    <!-- Add Product Modal -->
    <div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="productForm">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="productImage" class="form-label">Product Image</label>
              <input type="file" class="form-control" id="productImage">
              <div id="productImageError" class="text-danger"></div>
            </div>
            <div class="col-md-6">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productName" placeholder="Enter product name">
              <div id="productNameError" class="text-danger"></div>
            </div>
            <div class="col-md-6">
              <label for="productDescription" class="form-label">Description</label>
              <input type="text" class="form-control" id="productDescription" placeholder="Enter description">
              <div id="productDescriptionError" class="text-danger"></div>
            </div>
            <div class="col-md-6">
              <label for="productPrice" class="form-label">Price</label>
              <input type="number" class="form-control" id="productPrice" placeholder="Enter price">
              <div id="productPriceError" class="text-danger"></div>
            </div>
            <div class="col-md-6">
              <label for="productQuantity" class="form-label">QTY</label>
              <input type="number" class="form-control" id="productQuantity" placeholder="Enter quantity">
              <div id="productQuantityError" class="text-danger"></div>
            </div>
            <div class="col-md-6">
              <label for="productCategory" class="form-label">Category</label>
              <select class="form-select" id="productCategory">
                <option selected>Choose...</option>
                <option value="1">Frozen</option>
                <option value="2">Chicken</option>
                <option value="3">Grocery</option>
              </select>
              <div id="productCategoryError" class="text-danger"></div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" id="saveProductBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <?php include 'footer.php';?>
  <script src="../static/js/add-product.js"></script>
  <script src="../static/js/readAdminProducts.js"></script>
  </body>
</html>
