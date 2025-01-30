<?php
// Start session to store success or error messages
session_start();

// Include the database connection file
include('db.php');  // Make sure this path is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        // Insert the contact message into the database
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $message]);

        // Set a success message
        $_SESSION['contact_success'] = "Your message has been sent to customer service! We will get back to you soon.";

        // Redirect to the contact page with success message
        header('Location: ../pages/contact_us.php');
        exit();
    } catch (PDOException $e) {
        // Handle any database errors
        $_SESSION['contact_error'] = "An error occurred while sending your message. Please try again later.";
        header('Location: ../pages/contact_us.php');
        exit();
    }
}
