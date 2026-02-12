<?php
require 'auth.php';
require '../includes/db.php';
require 'header.php';


if ($_POST) {

    $imageName = time() . "_" . $_FILES['image']['name'];
    $imageTmp  = $_FILES['image']['tmp_name'];
    $path = "../uploads/products/" . $imageName;

    move_uploaded_file($imageTmp, $path);

    $stmt = $conn->prepare(
        "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param(
        "sdis",
        $_POST['name'],
        $_POST['price'],
        $_POST['description'],
        $imageName
    );
    $stmt->execute();

    header("Location: products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<h1> Add products</h1>
<form method="POST">
<label for="Product name">Product Name : <label>
<input name="name" placeholder="Product Name" required><br><br>
<label for="description">description : <label>
<input name="description" type="text" ><br><br>
<label for="price">price : <label>
<input name="price" type="number" required><br><br>
<input type="file" name="image" required>
</form>
<button>Add Product</button>


<?php include '../includes/footer.php'; ?>
