<?php


foreach ($products as $product) :
?>
    <div class="col-md-4">
        <div class="card">
            <img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $product['name'] ?></h5>
                <p class="card-text">$<?= $product['price'] ?></p>
                <button class="btn btn-primary add-to-cart" data-product-id="<?= $product['id'] ?>">Add to Cart</button>
            </div>
        </div>
    </div>
<?php endforeach; ?>