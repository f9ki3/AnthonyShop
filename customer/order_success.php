<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chicken Category</title>
    <?php include 'header.php';?>    
  </head>
  <body>
    <div class="d-flex flex-row">
      <?php include 'navbar.php'; ?>
      <div class="d-flex flex-column flex-grow-1">

        <div class="container g-3 p-3">
          <div class="row mt-5">
            <div class="container mt-5" style="max-width: 400px; margin: 0 auto; height: 90vh">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                    <h4 class="fw-bolder mb-3" style="margin: 0;">Order Success!</h4>
                    <p class="mb-3 text-center" style="margin: 0;">Congratulations, you place order successfully. Please wait 3 to 7 days to delivery</p>
                    <img style="height: 300px;" src="../static/img/order_success.svg" alt="Success">
                    <a href="my_order.php" class="btn rounded-3 w-100 btn-dark mt-3 text-light">Continue</a>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php';?>
    <script src="../static/js/chicken-page.js"></script>
  </body>
</html>
