<?php
// Start session to check for success message
session_start();

// Include header and navigation
include('../includes/header.php');
include('../includes/nav.php');

// Check if there is a success message in the session
if (isset($_SESSION['register_success'])) {
    $register_success_message = $_SESSION['register_success'];
    // Unset the session message so it doesn't show again
    unset($_SESSION['register_success']);
}
?>

<div style="width: 580px;" class="container">
    <h2 class="my-4">Customer Login</h2>
    <form action="../backend/login_action.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="mt-3">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
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
            window.location.href = '../pages/customer_login.php'; // Redirect to the login page after the toast is displayed
        }, 3000); // Adjust the delay as needed (3 seconds)
    </script>
<?php endif; ?>

<?php
// Include footer
include('../includes/footer.php');
?>