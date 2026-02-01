<?php
include 'includes/auth.php';
include 'includes/db.php';

$user_id = $_SESSION['user_id'];

$total_products = $conn->query(
"SELECT COUNT(*) AS total 
FROM products 
WHERE user_id = $user_id"
)->fetch_assoc()['total'];

$total_sales = $conn->query(
"SELECT SUM(quantity_sold) AS total 
FROM sales 
WHERE user_id = $user_id"
)->fetch_assoc()['total'];
$total_sales = $total_sales ?? 0;

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
<h2>SmartStock Dashboard</h2>
<a href="logout.php">Logout</a>
</div>

<div class="stats">
<div class="card">Total Products: <?= $total_products ?></div>
<div class="card">Total Sold Items: <?= $total_sales ?></div>
</div>

<a href="add_product.php" class="btn">Add Product</a>
<a href="sales_history.php" class="btn">Sales History</a>
<a href="total_sales.php" class="btn">Sales Report</a>


<table>
<tr>
<th>Name</th>
<th>Category</th>
<th>Qty</th>
<th>Price</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php
$user_id = $_SESSION['user_id'];   
$result = $conn->query("SELECT * FROM products WHERE user_id=$user_id");

while($row = $result->fetch_assoc()):
?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['category'] ?></td>
<td><?= $row['quantity'] ?></td>
<td>$<?= $row['price'] ?></td>
<td>

<?php
if($row['quantity'] <= $row['min_stock']){
    echo "<span class='status low'>LOW</span>";
} elseif($row['quantity'] <= 50){
    echo "<span class='status medium'>MEDIUM</span>";
} else {
    echo "<span class='status high'>HIGH</span>";
}
?>
</td>

<td>
<a href="sell_product.php?id=<?= $row['id'] ?>">Sell</a>
<a href="edit_product.php?id=<?= $row['id'] ?>">Edit</a>
<a href="delete_product.php?id=<?= $row['id'] ?>">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
