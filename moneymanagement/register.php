<?php
session_start();
require_once "database.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = strtolower(trim($_POST["email"] ?? ""));
    $password = $_POST["password"] ?? "";

    if ($name === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
        $error = "Enter your name, a valid email, and a password of at least 8 characters.";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hash);
        if ($stmt->execute()) {
            session_regenerate_id(true);
            $_SESSION["user_id"] = $stmt->insert_id;
            $_SESSION["user_name"] = $name;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = ($stmt->errno === 1062) ? "That email is already registered. Please log in." : "Could not create the account. Please try again.";
        }
        $stmt->close();
    }
}
?>
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><title>Create Account - Money Management</title><link rel="stylesheet" href="style.css"></head>
<body><main class="auth-card"><h1>Money Management</h1><h2>Create account</h2>
<?php if ($error !== ""): ?><p class="alert"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></p><?php endif; ?>
<form method="post">
<label>Full name</label><input name="name" maxlength="100" required>
<label>Email</label><input type="email" name="email" maxlength="190" required>
<label>Password (minimum 8 characters)</label><input type="password" name="password" minlength="8" required>
<button type="submit">Register</button>
</form><p>Already registered? <a href="login.php">Log in</a></p></main></body></html>
