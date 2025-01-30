<?php
session_start();
include('includes/header.php');
include('includes/nav.php');

// Fetch products from backend (or simulate data if not connected to DB)
include('backend/product_functions.php');
include('includes/HomeSectionOne.php');
include('includes/HomeSectionTwo.php');
include('includes/HomeNewArrival.php');
?>


<!-- Offcanvas Component for Cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasCartLabel">Your Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group" id="cart-items-list">
            <!-- Cart items will be populated here dynamically -->
        </ul>
        <button class="btn btn-success w-100 mt-3" id="proceed-checkout">Proceed to Checkout</button>
    </div>
</div>



<?php
include('includes/HomeFooterSection.php');
// Include footer
include('includes/footer.php');
?>