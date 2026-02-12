<?php
require_once 'includes/session.php';
require_once 'includes/db.php';

/* GET DATA */
$user_id = 1; // demo user
$total   = (float) $_SESSION['checkout_total'];
$payment_method  = $_POST['payment_method'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect data safely
    $checkout_total = isset($_POST['checkout_total']) ? $_POST['checkout_total'] : 0;
    $method = isset($_POST['method']) ? $_POST['method'] : 'unknown';
    $user_id = $_SESSION['user_id']; // example

    // Insert into database
    $sql = "INSERT INTO payments (user_id, method, amount) VALUES ('$user_id', '$method', '$checkout_total')";
    if ($conn->query($sql)) {
        // Redirect to prevent duplicate submission
        header("Location: success.php?order_id=" . $conn->insert_id);
        exit();
    } else {
        echo "Payment failed: " . $conn->error;
    }
}



/* CLEAR SESSION TOTAL */
unset($_SESSION['checkout_total']);



/* GET ORDER ID */
$order_id = $conn->insert_id;

/* SAVE PAYMENT */
//$sql = "INSERT INTO payments (order_id, payment_method, status, transaction_ref)
        //VALUES ($order_id, '$payment_method', 'Paid', 'TXN" . time() . "')";

if (!$conn->query($sql)) {
    die("Payment failed: " . $conn->error);
}

/* SESSION FOR SUCCESS PAGE */
$_SESSION['last_order_id'] = $order_id;

/* REDIRECT */
header("Location: success.php");
exit;
