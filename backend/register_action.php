<?php
// Start session to store messages
session_start();

// Include the database connection file
include('db.php'); // Make sure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    try {
        // Check if email already exists in the database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            echo "Email is already registered!";
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert new user into the database
            $insert_stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $insert_stmt->execute([$name, $email, $hashed_password]);

            // Set a success message in session
            $_SESSION['register_success'] = "Account created successfully! You can now login.";

            // Redirect to the login page
            header('Location: ../pages/customer_login.php');
            exit();
        }
    } catch (PDOException $e) {
        // Catch any errors during the query execution
        echo "Error: " . $e->getMessage();
    }
}
