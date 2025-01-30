<?php
// Sample cart item
$cart_items = [
    ['name' => 'Product 1', 'price' => 29.99, 'quantity' => 1],
    ['name' => 'Product 2', 'price' => 49.99, 'quantity' => 2]
];

foreach ($cart_items as $item) :
?>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $item['name'] ?></h5>
                <p class="card-text">Price: $<?= $item['price'] ?></p>
                <p class="card-text">Quantity: <?= $item['quantity'] ?></p>
                <p class="card-text">Total: $<?= $item['price'] * $item['quantity'] ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
