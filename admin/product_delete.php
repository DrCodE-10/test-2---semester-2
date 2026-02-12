<?php
require 'auth.php';
require '../includes/db.php';

$id = (int)$_GET['id'];
$conn->query("DELETE FROM products WHERE id=$id");

header("Location: products.php");

$id = (int)$_GET['id'];
$product = $conn->query("SELECT image FROM products WHERE id=$id")->fetch_assoc();

if ($product && file_exists("../uploads/products/".$product['image'])) {
    unlink("../uploads/products/".$product['image']);
}

$conn->query("DELETE FROM products WHERE id=$id");

header("Location: products.php");

?>

<input type="file" name="image" onchange="previewImage(event)">
<img id="preview" width="120" style="display:none;">

<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = 'block';
}
</script>
