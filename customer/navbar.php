<div style="width: 280px; height: 100vh;" class="navbar-responsive shadow bg-dark sticky-top">
    <div class="d-flex pt-3 flex-row align-items-center">
        <img src="../static/img/logo.png" style="width: 70px; height: 60px" alt="">
        <h4 class="text-light">Anthony's Shop</h4>
    </div>
    <hr class="m-3">
    <div class="list-group">
        <a href="/ADCF/customer/home.php" class="btn text-light text-start ms-3 me-3"><span><i class="bi fs-5 bi-house me-2"></i></span> Home</a>

        <!-- Parent button to toggle the collapse -->
        <button class="btn text-light text-start ms-3 me-3" data-bs-toggle="collapse" data-bs-target="#collapseButtons" aria-expanded="false" aria-controls="collapseButtons">
        <span><i class="bi fs-5 bi-postage me-2"></i></span>Products
        </button>

        <!-- Collapsible button group -->
        <div class="collapse" id="collapseButtons">
            <div class="d-flex flex-column">
                <a href="/ADCF/customer/chicken.php" class="btn text-light text-start ms-3 ps-4 me-3">Chicken</a>
                <a href="/ADCF/customer/frozen.php" class="btn text-light text-start ms-3 ps-4 me-3">Frozen</a>
                <a href="/ADCF/customer/grocery.php" class="btn text-light text-start ms-3 ps-4 me-3">Grocery</a>
            </div>
        </div>
        
        <button class="btn text-light text-start ms-3 me-3 "><span><i class="bi fs-5 bi-cart me-2"></i></span> Cart
            <span class=" badge rounded-pill bg-danger">
                99+
                <span class="visually-hidden">unread messages</span>
            </span>
        </button>
        <button class="btn text-light text-start ms-3 me-3"><span><i class="bi fs-5 bi-pass me-2"></i></span> My Orders</button>
        <button class="btn text-light text-start ms-3 me-3"><span><i class="bi fs-5 bi-power me-2"></i></span>Logout</button>
    </div>
</div>