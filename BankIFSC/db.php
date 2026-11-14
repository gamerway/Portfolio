<?php
/**
 * Database connection configuration.
 *
 * Set these environment variables in your hosting control panel:
 * DB_HOST, DB_NAME, DB_USER, DB_PASS
 *
 * Do not commit real database credentials to GitHub.
 */
$host = getenv("DB_HOST") ?: "localhost";
$username = getenv("DB_USER") ?: "";
$password = getenv("DB_PASS") ?: "";
$database = getenv("DB_NAME") ?: "";

if ($username === "" || $database === "") {
    http_response_code(500);
    die("Database configuration is missing. Set DB_HOST, DB_NAME, DB_USER and DB_PASS in your hosting environment.");
}

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    error_log("Bank IFSC database connection failed: " . mysqli_connect_error());
    http_response_code(500);
    die("Database connection failed. Please contact the website administrator.");
}

mysqli_set_charset($conn, "utf8mb4");
?>
