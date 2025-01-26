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
        <div class="g-3 p-3 container row">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search products" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
            </div>
        </div>
        <div class="row g-3 p-3 container">
            <h3>Chicken Products</h3>
            <div class="row" id="chicken-8">
            </div>
        </div>
        <div class="row g-3 p-3 container">
            <h3>Frozen Products</h3>
            <div class="row" id="frozen-8"></div>
        </div>
        <div class="row g-3 p-3 container">
            <h3>Grocery Products</h3>
            <div class="row" id="grocery-8"></div>
        </div>
    </div>
</div>


  <?php include 'footer.php';?>
</body>
</html>