<?php include 'session.php'?>
<div style="width: 280px; height: 100vh;" class="navbar-responsive shadow bg-dark sticky-top">
    <div class="d-flex pt-3 flex-row align-items-start">
        <img src="../static/img/logo.png" style="width: 70px; height: 60px" alt="">
        <div>
        <h4 class="text-light" style="padding: none; margin: none">Anthony Melo's</h4>
        <p style="font-size: 12px; color: white; padding: none; margin: none">Dress Chicken and Frozen Food</p>
        </div>
    </div>
    <hr class="m-3 text-light">
    <div class="list-group">
        <a href="home.php" class="btn text-light text-start ms-3 me-3"><span><i class="bi fs-5 bi-house me-2"></i></span> Home</a>

        <!-- Parent button to toggle the collapse -->
        <button class="btn text-light text-start ms-3 me-3" data-bs-toggle="collapse" data-bs-target="#collapseButtons" aria-expanded="false" aria-controls="collapseButtons">
        <span><i class="bi fs-5 bi-postage me-2"></i></span>Products
        </button>

        <!-- Collapsible button group -->
        <div class="collapse" id="collapseButtons">
            <div class="d-flex flex-column">
                <a href="chicken.php" class="btn text-light text-start ms-3 ps-4 me-3">Chicken</a>
                <a href="frozen.php" class="btn text-light text-start ms-3 ps-4 me-3">Frozen</a>
                <a href="grocery.php" class="btn text-light text-start ms-3 ps-4 me-3">Grocery</a>
            </div>
        </div>
        
        <a href="cart.php" class="btn text-light text-start ms-3 me-3 position-relative">
            <span><i class="bi fs-5 bi-cart me-2"></i> Cart</span>
            <!-- Cart icon badge container -->
            <div id="cart-icon-container" class="position-absolute top-0 end-0">
            </div>
        </a>

        <a href="my_order.php" class="btn text-light text-start ms-3 me-3"><span><i class="bi fs-5 bi-pass me-2"></i></span> My Orders</a>
        <a href="my_account.php" class="btn text-light text-start ms-3 me-3"><span><i class="bi fs-5 bi-file-person me-2"></i></span> My Account</a>
        <a href="logout.php" class="btn text-light text-start ms-3 me-3"><span><i class="bi fs-5 bi-power me-2"></i></span>Logout</a>
    </div>
</div>