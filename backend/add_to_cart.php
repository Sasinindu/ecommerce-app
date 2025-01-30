<?php
session_start();

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'add' && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
        $productId = $_POST['id'];
        $productName = $_POST['name'];
        $productPrice = $_POST['price'];

        // Create a product array
        $product = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice
        ];

        // If no cart exists, create one
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the product already exists in the cart
        $productExists = false;
        foreach ($_SESSION['cart'] as $key => $cartItem) {
            if ($cartItem['id'] == $productId) {
                $_SESSION['cart'][$key]['quantity'] += 1; // Increase quantity if the product is already in cart
                $productExists = true;
                break;
            }
        }

        // If the product doesn't exist, add it to the cart
        if (!$productExists) {
            $product['quantity'] = 1;
            $_SESSION['cart'][] = $product;
        }

        echo json_encode(['message' => 'Product added to cart', 'cart' => $_SESSION['cart']]);
    } elseif ($action === 'remove_one' && isset($_POST['id'])) {
        $productId = $_POST['id'];

        // Check if the cart exists
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $cartItem) {
                if ($cartItem['id'] == $productId) {
                    // Decrease quantity or remove the product entirely if quantity reaches 0
                    $_SESSION['cart'][$key]['quantity'] -= 1;
                    if ($_SESSION['cart'][$key]['quantity'] <= 0) {
                        unset($_SESSION['cart'][$key]);
                    }
                    break;
                }
            }
        }

        echo json_encode(['message' => 'Product quantity updated', 'cart' => $_SESSION['cart']]);
    } elseif ($action === 'remove' && isset($_POST['id'])) {
        $productId = $_POST['id'];

        // Check if the cart exists
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $cartItem) {
                if ($cartItem['id'] == $productId) {
                    unset($_SESSION['cart'][$key]); // Remove the item from the cart
                    break;
                }
            }
        }

        echo json_encode(['message' => 'Product removed from cart', 'cart' => $_SESSION['cart']]);
    }
} else {
    echo json_encode(['message' => 'Error: Missing action']);
}
