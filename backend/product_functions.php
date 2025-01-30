<?php

include('db.php');
// Example function to fetch products from the database
function getProducts()
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
