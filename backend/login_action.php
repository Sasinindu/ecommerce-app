<?php
// Start session to handle login session
session_start();

// Include the database connection file
include('db.php');  // Make sure the path to db.php is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get login form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepare a query to fetch the user by email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        // Check if a user exists with the provided email
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password with the hashed password from the database
            if (password_verify($password, $user['password'])) {
                // Login successful
                $_SESSION['user_id'] = $user['id'];  // Store user ID in session
                $_SESSION['user_name'] = $user['name'];  // Store user name in session

                // Redirect to the user dashboard or home page
                header('Location: ../pages/my_orders.php');  // Or wherever you want to redirect
                exit();
            } else {
                // Invalid password
                $_SESSION['login_error'] = "Invalid email or password.";
            }
        } else {
            // User not found
            $_SESSION['login_error'] = "Invalid email or password.";
        }
    } catch (PDOException $e) {
        // Handle database connection or query errors
        echo "Error: " . $e->getMessage();
    }
}
