<nav class="navbar navbar-expand-lg bg-light text-uppercase fs-6 p-3 border-bottom align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center w-100">

            <div class="col-auto">
                <div style="font-size: 28px; font-family: 'Marcellus', Roboto, sans-serif; color: black; font-weight: 500; text-transform: uppercase;">clothing store</div>
            </div>

            <div class="col-auto">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 gap-1 gap-md-5 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" href="/ecommerce-app/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/ecommerce-app/pages/contact_us.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/ecommerce-app/pages/customer_login.php">Customer Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-3 col-lg-auto">
                <ul class="list-unstyled d-flex m-0">
                    <li class="d-none d-lg-block">
                        <a href="#" class="text-uppercase mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                            aria-controls="offcanvasCart">Cart <span class="cart-count"></span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>