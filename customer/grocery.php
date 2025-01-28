<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grocery Category</title>
    <?php include 'header.php';?>    
  </head>
  <body>
    <div class="d-flex flex-row">
      <?php include 'navbar.php'; ?>
      <div class="d-flex flex-column flex-grow-1">
        <!-- Search bar -->
        <?php include 'search.php'; ?>

        <!-- Grocery Products -->
        <div class="container g-3 p-3">
          <h3><a href="home.php" style="color: black; text-decoration: none">Products</a> / Grocery Products</h3>
          
          <div class="row" id="grocery-page">
            <!-- Grocery product cards will be dynamically inserted here -->
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php';?>
    <script src="../static/js/grocery-page.js"></script>
  </body>
</html>
