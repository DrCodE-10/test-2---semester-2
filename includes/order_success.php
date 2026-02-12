<?php
include 'includes/header.php';
?>

<h1>Order Successful 🎉</h1>

<p>Your order has been placed successfully.</p>

<p>
<strong>Order ID:</strong>
<?php echo intval($_GET['order_id']); ?>
</p>

<a href="products.php">
    <button>Continue Shopping</button>
</a>

<?php include 'includes/footer.php'; ?>
