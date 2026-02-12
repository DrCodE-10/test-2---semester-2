<?php
include 'auth.php';
include '../includes/db.php';
include 'header.php';

$order_id = intval($_GET['id']);
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    mysqli_query($conn, "UPDATE orders SET status='$status' WHERE id=$order_id");
    $message = "Order status updated!";
}

$order = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM orders WHERE id=$order_id"));
?>
<!DOCTYPE html>
<html>
<h1>Update Order Status</h1>
<p style="color:green;"><?php echo $message; ?></p>

<form method="post">
    <label>Status:</label>
    <select name="status" required>
        <option value="pending" <?php if($order['status']=='pending') echo 'selected'; ?>>Pending</option>
        <option value="paid" <?php if($order['status']=='paid') echo 'selected'; ?>>Paid</option>
        <option value="delivered" <?php if($order['status']=='delivered') echo 'selected'; ?>>Delivered</option>
    </select>
    <button type="submit">Update</button>
</form>

<?php include '../includes/footer.php'; ?>
