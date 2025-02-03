<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
</head>
<body>
<?php include 'header.php'?> 
<?php include 'navbar.php'?>

<div class="container" style="height: 100vh">
  <div class="row mt-5">
    <div class="col-12 col-md-6">
        <div class="abstract-shape">
         <img id="animatedImg" src="static/img/about.jpg" alt="">
        </div>
    </div>
    <div class="col-12 col-md-6">
      <h1 style="font-size: 65px" class="fw-bold">About <strong class="text-red">Us</strong></h1>
      <p class="text-justify mt-5">We specialize in selling chicken products, frozen goods, and grocery products. Our journey began back on December 29, 1990, and since then, we've worked hard to make our store thrive. </p>
      <p>Thanks to the support of our customers, we've been able to expand, and now we have four branches located in Plaridel Public Market. At Anthony's Dress Chicken and Frozen Foods, we pride ourselves on providing high-quality products and excellent service to our customers. </p>
      <p>Whether you're looking for fresh chicken, tasty frozen meals, or other grocery essentials, we've got you covered.</p>
      <button class="btn text-light btn-lg bg-red mt-3">View Products</button>
    </div>

  </div>
</div>


<?php include 'footer_container.php'?> 
<?php include 'footer.php'?> 
<script>
    function generateRandomCurve() {
        return `${Math.random() * 70 + 30}% ${Math.random() * 70 + 30}% ` +
               `${Math.random() * 70 + 30}% ${Math.random() * 70 + 30}% / ` +
               `${Math.random() * 70 + 30}% ${Math.random() * 70 + 30}% ` +
               `${Math.random() * 70 + 30}% ${Math.random() * 70 + 30}%`;
    }

    function animateCurve() {
        const img = document.getElementById("animatedImg");
        img.style.borderRadius = generateRandomCurve();
    }

    // Animate every 2 seconds
    setInterval(animateCurve, 2000);
</script>

</body>
</html>