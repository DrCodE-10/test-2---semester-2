<?php
require 'auth.php';
require '../includes/db.php';
include 'header.php';
$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<div class="admin-wrapper">


<div class="main">
<h2>Products</h2>

<a href="add_product.php">➕ Add Product</a>

<table>
<tr>
<th>Name</th><th>Price</th><th>Qty</th><th>Actions</th><th>Image</th>
</tr>

<?php while($p = $products->fetch_assoc()): ?>
<tr>
<td><?= $p['name'] ?></td>
<td><?= $p['price'] ?></td>
<td><?= $p['description'] ?></td>
<td>
<a href="product_edit.php?id=<?= $p['id'] ?>">Edit</a> |
<a href="product_delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
</td>
<td>
    <img src="../uploads/products/<?= $p['image'] ?>" width="60">
</td>
</tr>
<?php endwhile; ?>

</table>
</div>
</div>
</body>
</html>


<?php include '../includes/footer.php'; ?>