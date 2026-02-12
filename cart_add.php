<?php
session_start();
require 'includes/db.php';

// Check if product ID is sent
if (!isset($_POST['product_id'])) {
    header("Location: products.php");
    exit;
}

$product_id = (int)$_POST['product_id'];

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Increase quantity if exists
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]++;
} else {
    $_SESSION['cart'][$product_id] = 1;
}

header("Location: cart.php");
exit;
?>
<?php include 'includes/footer.php'; ?>