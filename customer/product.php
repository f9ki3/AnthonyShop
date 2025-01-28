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
      <?php include 'search.php'; ?>

        <div class="container g-3 p-3">
          <h3>
            <a href="home.php" style="color: black; text-decoration: none;">Products</a> / 
            <span id="product-name"></span>
          </h3>

          <!-- Product Details -->
          <div class="row" id="product-container">
            <!-- Dynamically loaded products will appear here -->
          </div>

          <h3 style="margin-top: 100px" class="mb-5">Suggested Products</h3>
          <div class="row" id="suggestion">
            <!-- suggestion product cards will be dynamically inserted here -->
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php';?>
    <script src="../static/js/product.js"></script>
    <script src="../static/js/add-cart.js"></script>
    <script src="../static/js/suggestion.js"></script>
  </body>
</html>
