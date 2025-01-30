<?php
include('includes/header.php');
include('includes/nav.php');

// Fetch products from backend (or simulate data if not connected to DB)
include('backend/product_functions.php');
include('includes/HomeSectionOne.php');
include('includes/HomeSectionTwo.php');
include('includes/HomeNewArrival.php');
?>



<?php
include('includes/HomeFooterSection.php');
// Include footer
include('includes/footer.php');
?>