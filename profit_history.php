<?php
include 'includes/auth.php';
include 'includes/db.php';

$user_id = $_SESSION['user_id'];

// Total positive profit
$profit_row = $conn->query("
    SELECT SUM(profit) AS total_profit
    FROM profit_records
    WHERE user_id = $user_id AND profit > 0
")->fetch_assoc();

$total_profit = $profit_row['total_profit'] ?? 0;

// Total loss (negative values)
$loss_row = $conn->query("
    SELECT SUM(profit) AS total_loss
    FROM profit_records
    WHERE user_id = $user_id AND profit < 0
")->fetch_assoc();

$total_loss = abs($loss_row['total_loss'] ?? 0);

// Net result (profit - loss)
$net_result = $total_profit - $total_loss;
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

<div class="report-box">
    <h3>Total Company Profit</h3>
    <p style="
        font-size: 22px;
        font-weight: bold;
        color: <?= $total_profit < 0 ? 'red' : 'green' ?>;
    ">
        $<?= number_format($total_profit, 2) ?>
    </p>
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
    <td style="color: <?= $row['profit'] < 0 ? 'red' : 'green' ?>;">
    $<?= number_format($row['profit'],2) ?>
    </td>

    <td><?= $row['created_at'] ?></td>
</tr>
<?php endwhile; ?>

</table>
</div>

</body>
</html>
