<?php
// admin/product_edit.php

require 'auth.php';
require '../includes/db.php';

// Validate product ID
if (!isset($_GET['id'])) {
    header("Location: products.php");
    exit;
}

$id = (int)$_GET['id'];

// Fetch existing product
$result = $conn->query("SELECT * FROM products WHERE id = $id");
if ($result->num_rows === 0) {
    header("Location: products.php");
    exit;
}
$product = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name     = $_POST['name'];
    $price    = $_POST['price'];
    $description = $_POST['description'];

    // If new image uploaded
    if (!empty($_FILES['image']['name'])) {

        // Basic image validation
        $allowed = ['jpg','jpeg','png'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            die("Only JPG, JPEG, PNG images are allowed");
        }

        // Delete old image
        if (!empty($product['image']) && file_exists("../uploads/products/" . $product['image'])) {
            unlink("../uploads/products/" . $product['image']);
        }

        // Upload new image
        $imageName = time() . "_" . $_FILES['image']['name'];
        $imageTmp  = $_FILES['image']['tmp_name'];
        move_uploaded_file($imageTmp, "../uploads/products/" . $imageName);

        // Update with image
        $stmt = $conn->prepare(
            "UPDATE products SET name=?, price=?, description=?, image=? WHERE id=?"
        );
        $stmt->bind_param("sdisi", $name, $price, $description, $imageName, $id);

    } else {
        // Update without image
        $stmt = $conn->prepare(
            "UPDATE products SET name=?, price=?, description=? WHERE id=?"
        );
        $stmt->bind_param("sdii", $name, $price, $description, $id);
    }

    $stmt->execute();
    header("Location: products.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
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
        <a href="../logout.php">Logout</a>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">
        <h2>Edit Product</h2>

        <form method="POST" enctype="multipart/form-data">

            <label>Product Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

            <label>Price (TZS)</label>
            <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>

            <label>description</label>
            <input type="text" name="description" value="<?= $product['description'] ?>" required>

            <label>Current Image</label><br>
            <?php if (!empty($product['image'])): ?>
                <img src="../uploads/products/<?= $product['image'] ?>" width="150">
            <?php else: ?>
                <p>No image</p>
            <?php endif; ?>
            <br><br>

            <label>Change Image (optional)</label>
            <input type="file" name="image" onchange="previewImage(event)">

            <br>
            <img id="preview" width="150" style="display:none;">
            <br><br>

            <button type="submit">Update Product</button>

        </form>
    </div>

</div>

<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = 'block';
}
</script>

</body>
</html>