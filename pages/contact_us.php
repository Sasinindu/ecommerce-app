<?php
// Include header and navigation
include('../includes/header.php');
include('../includes/nav.php');

// Check if there is a success message in the session
if (isset($_SESSION['contact_success'])) {
    $register_success_message = $_SESSION['contact_success'];
    // Unset the session message so it doesn't show again
    unset($_SESSION['contact_success']);
}
?>

<div class="container my-5">
    <h2 class="my-4">Contact Us</h2>

    <!-- Contact Form -->
    <form action="../backend/contact_us_action.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div>


<!-- Toast for success message -->
<?php if (isset($register_success_message)): ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?php echo $register_success_message; ?>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        // Display the toast
        var toastEl = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();

        // Redirect after 3 seconds (optional)
        setTimeout(function() {
            window.location.href = '../pages/contact_us.php'; // Redirect to the login page after the toast is displayed
        }, 3000); // Adjust the delay as needed (3 seconds)
    </script>
<?php endif; ?>
<?php
// Include footer
include('../includes/footer.php');
?>