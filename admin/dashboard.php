<?php
require 'auth.php';
require '../includes/db.php';

$productCount = $conn->query("SELECT COUNT(*) total FROM products")->fetch_assoc()['total'];
$orderCount   = $conn->query("SELECT COUNT(*) total FROM orders")->fetch_assoc()['total'];
$userCount    = $conn->query("SELECT COUNT(*) total FROM users")->fetch_assoc()['total'];
$revenue      = $conn->query("SELECT SUM(total) total FROM orders WHERE status='Completed'")
                      ->fetch_assoc()['total'] ?? 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="products.php">Products</a>
        <a href="orders.php">Orders</a>
        <a href="users.php">Users</a>
        <a href="../index.php">Home Page</a>
        <a href="../logout.php">Logout</a>
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="admin-header">
            <h2>Dashboard</h2>
            <span>Welcome, <?php echo $_SESSION['name']; ?></span>
        </div>

        <!-- STATS -->
        <p>Total Products = <?= $productCount ?></p>
        <p>Total orders = <?= $orderCount ?></p>
        <p> Total users = <?= $userCount ?></p>
        <p><?= number_format($revenue) ?></p>




    </div>

</div>

</body>
</html>


<?php include '../includes/footer.php'; ?>
