<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/auth.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    unset($_SESSION['cart'][$id]);
}

header("Location: cart.php");
exit;

?>

<?php include 'includes/footer.php'; ?>