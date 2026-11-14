<?php
require_once "auth.php";
require_login();
require_once "database.php";
$user_id = (int)$_SESSION["user_id"];
$stmt = $conn->prepare("SELECT
 COALESCE(SUM(CASE WHEN transaction_type='income' THEN amount ELSE 0 END),0),
 COALESCE(SUM(CASE WHEN transaction_type='expense' THEN amount ELSE 0 END),0)
 FROM transactions WHERE user_id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($income, $expenses);
$stmt->fetch();
$stmt->close();
$balance = (float)$income - (float)$expenses;
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><title>Dashboard - Money Management</title><link rel="stylesheet" href="style.css"></head>
<body><header class="topbar"><strong>Money Management</strong><nav><a href="dashboard.php">Dashboard</a><a href="add_transaction.php">Add transaction</a><a href="history.php">History</a><a href="logout.php">Logout</a></nav></header>
<main class="container"><h1>Welcome, <?= htmlspecialchars($_SESSION["user_name"], ENT_QUOTES, "UTF-8") ?>!</h1><p>Here is your personal money summary.</p>
<section class="summary">
<div class="summary-card"><span>Total income</span><strong>₹<?= number_format((float)$income, 2) ?></strong></div>
<div class="summary-card"><span>Total expenses</span><strong>₹<?= number_format((float)$expenses, 2) ?></strong></div>
<div class="summary-card"><span>Balance</span><strong>₹<?= number_format($balance, 2) ?></strong></div>
</section>
<div class="actions"><a class="button" href="add_transaction.php">+ Add income or expense</a><a class="button secondary" href="history.php">View transaction history</a></div>
<p class="hint">Tip: Add every income and expense to keep your balance up to date.</p></main></body></html>
