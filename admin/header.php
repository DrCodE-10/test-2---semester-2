<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dr. Genge Online</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<header class="navbar">
    <div class="logo">
        <a href="../index.php">🏠 HomeCommerce</a>
    </div>

<nav>
    <a href="dashboard.php">Home</a>
    <a href="products.php">Products</a>
    <a href="users.php">Users</a>
    <a href="orders.php">Orders</a>

    <?php if (isset($_SESSION['user_id'])) { ?>
        <span>Hi,      <?php echo htmlspecialchars($_SESSION['name']); ?></span>
        <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php } ?>
</nav>

</header>

<main class="container">
