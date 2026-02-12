<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/auth.php';
require_once 'includes/session.php';



if (empty($_SESSION['cart'])) {
    echo "<h2>Your cart is empty</h2>";
    exit;
}

$ids = implode(",", array_keys($_SESSION['cart']));
$result = $conn->query("SELECT * FROM products WHERE id IN ($ids)");

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Your Cart</h2>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>Product</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Subtotal</th>
    <th>Action</th>
</tr>

<?php while ($p = $result->fetch_assoc()): 
    $qty = $_SESSION['cart'][$p['id']];
    $subtotal = $p['price'] * $qty;
    $total += $subtotal;
?>
<tr>
    <td><?= htmlspecialchars($p['name']) ?></td>
    <td><?= number_format($p['price']) ?></td>
    <td>
        <form method="POST" action="cart_update.php" style="display:inline">
            <input type="hidden" name="id" value="<?= $p['id'] ?>">
            <input type="hidden" name="action" value="decrease">
            <button>-</button>
        </form>

        <?= $qty ?>

        <form method="POST" action="cart_update.php" style="display:inline">
            <input type="hidden" name="id" value="<?= $p['id'] ?>">
            <input type="hidden" name="action" value="increase">
            <button>+</button>
        </form>
    </td>
    <td><?= number_format($subtotal) ?></td>
    <td>
        <a href="cart_remove.php?id=<?= $p['id'] ?>"
           onclick="return confirm('Remove item?')">Remove</a>
    </td>
</tr>
<?php endwhile; ?>

<tr>
    <th colspan="3">TOTAL</th>
    <th><?= number_format($total) ?></th>
    <th></th>
</tr>

</table>

<br>
<a href="checkout.php">Proceed to Checkout</a>

</body>
</html>

<?php include 'includes/footer.php'; ?>
