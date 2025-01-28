<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <?php include 'header.php';?>    
  </head>
  <body>
    <div class="d-flex flex-row">
      <?php include 'navbar.php'; ?>
      <div class="d-flex flex-column flex-grow-1">
      <?php include 'search.php'; ?>

        <div class="container g-3 p-3">
            <div>
                <h3>Search Product / <span id="words"></span></h3>
            </div>

          <div class="row" id="search-results">
            <!-- Chicken products will be loaded here -->
          </div>
        </div>

    <?php include 'footer.php';?>
    <script src="../static/js/search_product.js"></script>
  </body>
</html>
