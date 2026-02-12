<?php
include 'auth.php';
include '../includes/db.php';
include 'header.php';

$orders = mysqli_query($conn,
    "SELECT * FROM orders ORDER BY created_at DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<h1>All Orders</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($orders)) { ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['user_id']; ?></td>
    <td>TZS <?php echo number_format($row['total']); ?></td>
    <td><?php echo $row['status']; ?></td>
    <td><?php echo $row['created_at']; ?></td>
    <td>
        <a href="update_order.php?id=<?php echo $row['id']; ?>">Update Status</a>
    </td>
</tr>
<?php } ?>
</table>

<?php include '../includes/footer.php'; ?>