<?php
include 'includes/auth.php';
include 'includes/db.php';

if($_POST){
    $name = $_POST['name']; 
    $category = $_POST['category'];
    $qty = $_POST['quantity'];
    $price = $_POST['price'];
    $min = $_POST['min_stock'];
    $cost_price = $_POST['cost_price'];

    $user_id = $_SESSION['user_id'];

    $conn->query("INSERT INTO products 
    (name,category,quantity,cost_price,price,min_stock,user_id)
    VALUES('$name','$category','$qty','$cost_price','$price','$min',$user_id)");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
<h2>Add New Product</h2>
<a href="index.php">Back</a>
</div>

<div class="form-container">
<form method="POST" class="styled-form">

<label>Product Name</label>
<input name="name" required class="add-product-input-field">

<label>Category</label>
<input name="category" required class="add-product-input-field">

<label>Quantity</label>
<input type="number" name="quantity" required class="add-product-input-field">

<label>Cost Price ($)</label>
<input type="number" step="0.01" name="cost_price" required>


<label>Price ($)</label>
<input type="number" step="0.01" name="price" required class="add-product-input-field">

<label>Minimum Stock Alert Level</label>
<input type="number" name="min_stock" required class="add-product-input-field">

<button>Add Product</button>

</form>
</div>

</body>
</html>
