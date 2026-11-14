<?php
/*
 * Hosting setup:
 * Replace the four values below with the MySQL details shown in your hosting
 * control panel. Do not use your local XAMPP credentials here.
 */
$db_host = "YOUR_HOSTING_DATABASE_HOST";
$db_user = "YOUR_HOSTING_DATABASE_USERNAME";
$db_pass = "YOUR_HOSTING_DATABASE_PASSWORD";
$db_name = "YOUR_HOSTING_DATABASE_NAME";

mysqli_report(MYSQLI_REPORT_OFF);
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    error_log("Money Management database connection failed: " . $conn->connect_error);
    http_response_code(500);
    exit("Database connection failed. Check the hosting database settings in database.php.");
}

$conn->set_charset("utf8mb4");
?>
