<?php
include 'includes/header.php';
include 'includes/auth.php';
require 'includes/db.php';

/* calculate total */
$total = $_SESSION['cart_total']; // example

$_SESSION['checkout_total'] = $total;
/* go to payment */
header("Location: payment.php");
exit;
?>

<form method="POST" action="success.php">
    <input type="hidden" name="amount" value="<?= $total ?>">
     <label for="payment mobile">Choose a payment network:</label><br><br>
    <select id="payment mobile" name="payment mobile">
        <option value="Vodacom">Vodacom</option>
        <option value="Airtel">Airtel</option>
        <option value="Mixx by Yas">Mixx by yas</option>
        <option value="Halotel">Halotel</option>
    </select><br><br>
    <input type="text" name="phone" placeholder="2557XXXXXXXX" required><br><br>
    <button type="submit">Pay (Mobile Money)</button><br><br>
</form>


<?php include 'includes/footer.php'; ?>