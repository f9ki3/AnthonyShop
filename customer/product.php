<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <?php include 'header.php';?>    
</head>
  <body>
  <div class="d-flex flex-row">
    <?php include 'navbar.php'; ?>
    <div class="d-flex flex-column flex-grow-1">
        <div class="g-3 p-3 container row">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search products" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
            </div>
        </div>
        <div class="row g-3 p-3 container">
            <h3><a href="home.php" style="color: black; text-decoration: none">Products</a> / Products</h3>
            <!-- Product Card 1 -->
            <div class="col-6 col-md-3">
                <div>
                    <div class="product-img mb-2">
                        <img src="../static/img/pancitcanton.jpg" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="product-desc text-start">
                        <p class="m-0 p-0">Lorem ipsum dolor sit amet</p>
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="fw-bold">PHP 100.00</h5>
                            <p>Stock 99</p>
                        </div>
                        <button class="btn btn-dark w-100 mb-2"><i class="bi bi-bag-plus me-2"></i> Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div>
                    <div class="product-img mb-2">
                        <img src="../static/img/pancitcanton.jpg" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="product-desc text-start">
                        <p class="m-0 p-0">Lorem ipsum dolor sit amet</p>
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="fw-bold">PHP 100.00</h5>
                            <p>Stock 99</p>
                        </div>
                        <button class="btn btn-dark w-100 mb-2"><i class="bi bi-bag-plus me-2"></i> Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div>
                    <div class="product-img mb-2">
                        <img src="../static/img/pancitcanton.jpg" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="product-desc text-start">
                        <p class="m-0 p-0">Lorem ipsum dolor sit amet</p>
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="fw-bold">PHP 100.00</h5>
                            <p>Stock 99</p>
                        </div>
                        <button class="btn btn-dark w-100 mb-2"><i class="bi bi-bag-plus me-2"></i> Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div>
                    <div class="product-img mb-2">
                        <img src="../static/img/pancitcanton.jpg" alt="Product Image" class="img-fluid">
                    </div>
                    <div class="product-desc text-start">
                        <p class="m-0 p-0">Lorem ipsum dolor sit amet</p>
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="fw-bold">PHP 100.00</h5>
                            <p>Stock 99</p>
                        </div>
                        <button class="btn btn-dark w-100 mb-2"><i class="bi bi-bag-plus me-2"></i> Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  <?php include 'footer.php';?>
</body>
</html>