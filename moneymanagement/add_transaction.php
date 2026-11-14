<?php
require_once "auth.php";
require_login();
require_once "database.php";
$error = "";
$allowed_types = ["income", "expense"];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $type = $_POST["transaction_type"] ?? "";
    $category = trim($_POST["category"] ?? "");
    $amount_raw = trim($_POST["amount"] ?? "");
    $date = $_POST["transaction_date"] ?? "";
    $note = trim($_POST["note"] ?? "");
    $amount = filter_var($amount_raw, FILTER_VALIDATE_FLOAT);
    $date_obj = DateTime::createFromFormat("Y-m-d", $date);
    $valid_date = $date_obj && $date_obj->format("Y-m-d") === $date;

    if (!in_array($type, $allowed_types, true) || $category === "" || strlen($category) > 100 ||
        $amount === false || $amount <= 0 || !$valid_date || strlen($note) > 255) {
        $error = "Please enter a valid type, category, positive amount, date, and note (255 characters max).";
    } else {
        $user_id = (int)$_SESSION["user_id"];
        $stmt = $conn->prepare("INSERT INTO transactions (user_id, transaction_type, category, amount, transaction_date, note) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issdss", $user_id, $type, $category, $amount, $date, $note);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: history.php?added=1");
            exit;
        }
        $error = "Could not save this transaction. Please try again.";
        $stmt->close();
    }
}
?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><title>Add Transaction</title><link rel="stylesheet" href="style.css"></head>
<body><header class="topbar"><strong>Money Management</strong><nav><a href="dashboard.php">Dashboard</a><a href="add_transaction.php">Add transaction</a><a href="history.php">History</a><a href="logout.php">Logout</a></nav></header>
<main class="container narrow"><h1>Add income or expense</h1>
<?php if ($error !== ""): ?><p class="alert"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></p><?php endif; ?>
<form class="panel" method="post">
<label>Transaction type</label><select name="transaction_type" required><option value="income">Income</option><option value="expense">Expense</option></select>
<label>Category</label><input name="category" maxlength="100" placeholder="e.g. Salary, Food, Travel" required>
<label>Amount (₹)</label><input type="number" name="amount" min="0.01" step="0.01" required>
<label>Date</label><input type="date" name="transaction_date" value="<?= date("Y-m-d") ?>" required>
<label>Note (optional)</label><input name="note" maxlength="255" placeholder="Short description">
<button type="submit">Save transaction</button>
</form></main></body></html>
