<?php
// Include header and navigation
include('../includes/header.php');
include('../includes/nav.php');
?>

<div style="width: 580px;" class="container">
    <h2 class="my-4">Create an Account</h2>
    <form action="../backend/register_action.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <div class="mt-3">
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

<?php
// Include footer
include('../includes/footer.php');
?>
