<?php
include 'includes/auth.php';
include 'includes/db.php';

$id = $_GET['id'];

$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if($_POST){
    $sold = $_POST['quantity'];

    if($sold > $product['quantity']){
        $error = "Not enough stock available!";
    } else {

        $user_id = $_SESSION['user_id'];

   
        $conn->query("INSERT INTO sold_products
        (product_name, price, quantity_sold, user_id)
        VALUES(
        '{$product['name']}',
        {$product['price']},
        $sold,
        $user_id
        )");

     
        $conn->query("UPDATE products
        SET quantity = quantity - $sold
        WHERE id = $id AND user_id = $user_id");

      
        $conn->query("INSERT INTO sales
        (product_id, quantity_sold, user_id)
        VALUES ($id, $sold, $user_id)");

        header("Location:index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sell Product</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="sell-product-page">

    <div class="sell-product-container"> 
        <form method="POST" class="sell-product-form">
            <h2 class="form-title">Sell Product</h2>

            <div class="product-info">
                <p><strong>Product:</strong> <span class="product-name"><?= htmlspecialchars($product['name']) ?></span></p>
                <p><strong>Available Stock:</strong> <span class="product-stock"><?= $product['quantity'] ?></span></p>
                <p><strong>Price:</strong> $<span class="product-price"><?= $product['price'] ?></span></p>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity to Sell</label>
                <input type="number" name="quantity" id="quantity" min="1" max="<?= $product['quantity'] ?>" placeholder="Enter quantity" required>
            </div>

            <?php if(isset($error)): ?>
                <p class="error-message"><?= $error ?></p>
            <?php endif; ?>

            <button type="submit" class="btn btn-confirm">Confirm Sale</button>
        </form>
    </div>

</div>

</body>
</html>
