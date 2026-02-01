<?php
include 'includes/auth.php';
include 'includes/db.php';

$user_id = $_SESSION['user_id'];

$result = $conn->query("
SELECT 
    sales.quantity_sold,
    sales.created_at,
    products.name,
    products.price,
    (sales.quantity_sold * products.price) AS total_value
FROM sales
JOIN products ON sales.product_id = products.id
WHERE sales.user_id = $user_id
ORDER BY sales.created_at DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sales History</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <h2>Sales History</h2>
    <a href="index.php">Back to Dashboard</a>
</div>

<div class="table-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity Sold</th>
                <th>Total Value</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
        <?php if($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>$<?= number_format($row['price'], 2) ?></td>
                <td><?= $row['quantity_sold'] ?></td>
                <td>$<?= number_format($row['total_value'], 2) ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">No sales recorded yet</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
