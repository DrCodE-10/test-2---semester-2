<?php
include 'includes/db.php';
include 'includes/header.php';
include 'includes/auth.php';

if (isset($_POST['id'], $_POST['action'])) {

    $id = (int)$_POST['id'];

    if ($_POST['action'] === 'increase') {
        $_SESSION['cart'][$id]++;
    }

    if ($_POST['action'] === 'decrease') {
        $_SESSION['cart'][$id]--;

        if ($_SESSION['cart'][$id] <= 0) {
            unset($_SESSION['cart'][$id]);
        }
    }
}

header("Location: cart.php");
exit;
?>

<?php include 'includes/footer.php'; ?>
