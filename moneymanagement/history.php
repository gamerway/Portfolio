<?php
require_once "auth.php";
require_login();
require_once "database.php";
$user_id = (int)$_SESSION["user_id"];
$stmt = $conn->prepare("SELECT id, transaction_type, category, amount, transaction_date, note FROM transactions WHERE user_id=? ORDER BY transaction_date DESC, id DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($id, $type, $category, $amount, $date, $note);
$rows = [];
while ($stmt->fetch()) {
    $rows[] = ["id"=>$id, "type"=>$type, "category"=>$category, "amount"=>$amount, "date"=>$date, "note"=>$note];
}
$stmt->close();
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><title>Transaction History</title><link rel="stylesheet" href="style.css"></head>
<body><header class="topbar"><strong>Money Management</strong><nav><a href="dashboard.php">Dashboard</a><a href="add_transaction.php">Add transaction</a><a href="history.php">History</a><a href="logout.php">Logout</a></nav></header>
<main class="container"><h1>Transaction history</h1>
<?php if (isset($_GET["added"])): ?><p class="success">Transaction saved successfully.</p><?php endif; ?>
<p><a class="button" href="add_transaction.php">+ Add transaction</a></p>
<div class="table-wrap"><table><thead><tr><th>Date</th><th>Type</th><th>Category</th><th>Amount</th><th>Note</th></tr></thead><tbody>
<?php if (!$rows): ?><tr><td colspan="5">No transactions yet. Add your first income or expense.</td></tr><?php else: foreach ($rows as $row): ?>
<tr><td><?= htmlspecialchars($row["date"], ENT_QUOTES, "UTF-8") ?></td><td><span class="<?= $row["type"] === "income" ? "income" : "expense" ?>"><?= htmlspecialchars(ucfirst($row["type"]), ENT_QUOTES, "UTF-8") ?></span></td><td><?= htmlspecialchars($row["category"], ENT_QUOTES, "UTF-8") ?></td><td>₹<?= number_format((float)$row["amount"], 2) ?></td><td><?= htmlspecialchars($row["note"] ?? "", ENT_QUOTES, "UTF-8") ?></td></tr>
<?php endforeach; endif; ?>
</tbody></table></div></main></body></html>
