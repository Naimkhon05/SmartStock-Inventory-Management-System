<?php
include 'includes/auth.php';
include 'includes/db.php';

$user_id = $_SESSION['user_id'];


$result = $conn->query("
SELECT SUM(quantity_sold * price) AS total_revenue
FROM sold_products
WHERE user_id = $user_id
");
$data = $result->fetch_assoc();
$total_revenue = $data['total_revenue'] ?? 0;

$result = $conn->query("
SELECT SUM(quantity_sold) AS total_items
FROM sold_products
WHERE user_id = $user_id
");
$data = $result->fetch_assoc();
$total_items = $data['total_items'] ?? 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>Total Sales Report</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <h2>Total Sales Report</h2>
    <a href="index.php">Back</a>
</div>

<div class="report-box">
    <h3>Total Revenue</h3>
    <p>$<?= number_format($total_revenue, 2) ?></p>

    <h3>Total Items Sold</h3>
    <p><?= $total_items ?></p>
</div>

</body>
</html>
