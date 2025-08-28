<?php
// Check if running on a local development environment
if ($_SERVER['HTTP_HOST'] === 'localhost') {
    // Local database settings (for XAMPP/MAMP)
    $server_name = "windows";
    $user_name = "Aurittro Hossain";  // Default XAMPP user
    $password = "@Urittro7";       // Default XAMPP password (empty)
    $db_name = "ns_coffee"; // Your local database name

    // Define the base URL for the local environment
    define("url", "http://localhost/workspace/coffee-shop-management-system");
    define("ADMINURL", "http://localhost/workspace/coffee-shop-management-system/admin-panel");
} else {
    // Live database settings
    $env_file = $_SERVER['DOCUMENT_ROOT'] . '/.env';

    // Check if the .env file exists
    if (file_exists($env_file)) {
        $env = parse_ini_file($env_file);
    } else {
        die("❌ Error: .env file is missing! Please upload it to your server.");
    }

    // Load database credentials from .env
    $server_name = $env['DB_HOST'] ?? '';
    $user_name = $env['DB_USER'] ?? '';
    $password = $env['DB_PASS'] ?? '';
    $db_name = $env['DB_NAME'] ?? '';

    // Define the base URL for the live environment
    define("url", "https://" . $_SERVER['HTTP_HOST']);
    define("ADMINURL", "https://" . $_SERVER['HTTP_HOST'] . "/admin-panel");
}

// Create a connection to the MySQL database
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

// Check if the connection was successful
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
