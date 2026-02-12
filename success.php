<?php
require_once 'includes/session.php';
include 'includes/db.php';
include 'includes/header.php';


/* SIMULATED USER */
$user_id = 1;
$total = 50000;

/* 1️⃣ INSERT ORDER */
$sql = "INSERT INTO orders (user_id, total, status)
        VALUES ($user_id, $total, 'pending')";

if (!$conn->query($sql)) {
    die("Order insert failed");
}

/* 2️⃣ GET ORDER ID */
$order_id = $conn->insert_id;

/* 3️⃣ VERIFY */
if (!$order_id) {
    die("Order ID not generated");
}

/* 4️⃣ STORE IN SESSION */
$_SESSION['last_order_id'] = $order_id;


/* ✅ Validate access */
if (!isset($_SESSION['last_order_id'])) {
    die("Invalid access");
}

/* ✅ Get order ID from session ONLY */
$order_id = (int) $_SESSION['last_order_id'];
unset($_SESSION['last_order_id']); // prevent refresh issues

/* ✅ Fetch payment info (optional) */
$payment = null;
$result = $conn->query("
    SELECT * FROM payments 
    WHERE order_id = $order_id 
    LIMIT 1
");

if ($result) {
    $payment = $result->fetch_assoc();
}
?>

<h1>Order Successful 🎉</h1>

<p><strong>Order ID:</strong> <?= $order_id ?></p>
<p><strong>Payment Method:</strong> <?= $payment['method'] ?? 'Mobile Money' ?></p>
<p><strong>Payment Status:</strong> <?= $payment['status'] ?? 'Paid' ?></p>
<p><strong>Transaction Ref:</strong> <?= $payment['transaction_ref'] ?? 'N/A' ?></p>

<a href="products.php">
    <button>Continue Shopping</button>
</a>

<?php include 'includes/footer.php'; ?>
