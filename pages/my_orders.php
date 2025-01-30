<?php
// Include header and navigation
include('../includes/header.php');
include('../includes/nav.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header('Location: ../pages/customer_login.php');
    exit();
}
$user_id = $_SESSION['user_id'];  // Logged-in user ID

// Database connection
include('../backend/db.php');

// Fetch orders from the database (pending or completed)
$query = "SELECT * FROM orders WHERE customer_id = :customer_id ORDER BY order_date DESC";
$stmt = $pdo->prepare($query);
$stmt->execute(['customer_id' => $user_id]);
$orders = $stmt->fetchAll();
?>

<div class="container my-5">
    <h2>My Orders</h2>

    <?php if (count($orders) > 0): ?>
        <!-- Display Orders -->
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Item Name</th>
                    <th>Order Date</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['item_name']; ?></td>
                        <td><?php echo date("F j, Y", strtotime($order['order_date'])); ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td>$<?php echo number_format($order['total_amount'], 2); ?></td>
                        <td>
                            <?php
                            // Display status with a badge
                            if ($order['order_status'] == 'pending') {
                                echo '<span class="badge bg-warning">Pending</span>';
                            } elseif ($order['order_status'] == 'completed') {
                                echo '<span class="badge bg-success">Completed</span>';
                            } else {
                                echo '<span class="badge bg-secondary">Shipped</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <!-- Display the product image -->
                            <img src="../assets/images/<?php echo $order['item_image']; ?>" alt="<?php echo $order['item_name']; ?>" style="width: 50px; height: 50px;">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>
</div>

<?php
// Include footer
include('../includes/footer.php');
?>