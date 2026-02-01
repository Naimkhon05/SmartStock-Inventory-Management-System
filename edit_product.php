<?php
include 'includes/auth.php';
include 'includes/db.php';

$id = $_GET['id'];

// Fetch existing product
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_assoc();

if($_POST){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $min_stock = $_POST['min_stock'];

    $conn->query("UPDATE products SET 
        name='$name',
        category='$category',
        quantity='$quantity',
        price='$price',
        min_stock='$min_stock'
        WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<form method="POST" class="form-box" id="edit-product-form">
<h2>Edit Product</h2>

<input name="name" value="<?= $product['name'] ?>" required placeholder="Product Name">
<input name="category" value="<?= $product['category'] ?>" placeholder="Category">
<input type="number" name="quantity" value="<?= $product['quantity'] ?>" placeholder="Quantity">
<input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" placeholder="Price">
<input type="number" name="min_stock" value="<?= $product['min_stock'] ?>" placeholder="Minimum Stock">
<button id="update-product-btn">Update Product</button>

</form>

</body>
</html>
