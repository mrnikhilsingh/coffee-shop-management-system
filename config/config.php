<?php
// full path to the .env file
$env_file = $_SERVER['DOCUMENT_ROOT'] . '/.env';

// Check if .env file exists before reading
if (file_exists($env_file)) {
    $env = parse_ini_file($env_file);
} else {
    die("❌ Error: .env file is missing! Please upload it to your server.");
}

// Database connection details
$server_name = $env['DB_HOST'] ?? '';
$user_name = $env['DB_USER'] ?? '';
$password = $env['DB_PASS'] ?? '';
$db_name = $env['DB_NAME'] ?? '';

// Create a connection to the MySQL database
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

// Check if the connection was successful
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
