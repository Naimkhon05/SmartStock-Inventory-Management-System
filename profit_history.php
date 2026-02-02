<?php
include 'includes/auth.php';
include 'includes/db.php';

$user_id = $_SESSION['user_id'];

$result = $conn->query("
SELECT * FROM profit_records
WHERE user_id = $user_id
ORDER BY created_at DESC
");

$total_profit_row = $conn->query("
    SELECT SUM(profit) AS total_profit
    FROM profit_records
    WHERE user_id = $user_id
")->fetch_assoc();

$total_profit = $total_profit_row['total_profit'] ?? 0;

?>

<!DOCTYPE html>
<html>
<head>
<title>Profit History</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
<h2>Profit History</h2>
<a href="index.php">Back</a>
</div>

<div class="table-container">
<table class="styled-table">
<tr>
    <th>Product</th>
    <th>Category</th>
    <th>Cost Price</th>
    <th>Sell Price</th>
    <th>Quantity</th>
    <th>Profit</th>
    <th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['product_name']) ?></td>
    <td><?= htmlspecialchars($row['category']) ?></td>
    <td>$<?= number_format($row['cost_price'],2) ?></td>
    <td>$<?= number_format($row['sell_price'],2) ?></td>
    <td><?= $row['quantity_sold'] ?></td>
    <td style="color:green;">
        $<?= number_format($row['profit'],2) ?>
    </td>
    <td><?= $row['created_at'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</div>

</body>
</html>
