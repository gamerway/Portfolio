<?php
session_start();
require_once "database.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = strtolower(trim($_POST["email"] ?? ""));
    $password = $_POST["password"] ?? "";
    $stmt = $conn->prepare("SELECT id, name, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $name, $password_hash);
        $stmt->fetch();
        if (password_verify($password, $password_hash)) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $name;
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = "Invalid email or password.";
    $stmt->close();
}
?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><title>Login - Money Management</title><link rel="stylesheet" href="style.css"></head>
<body><main class="auth-card"><h1>Money Management</h1><h2>Login</h2>
<?php if ($error !== ""): ?><p class="alert"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></p><?php endif; ?>
<form method="post">
<label>Email</label><input type="email" name="email" required>
<label>Password</label><input type="password" name="password" required>
<button type="submit">Login</button>
</form><p>New user? <a href="register.php">Create an account</a></p></main></body></html>
