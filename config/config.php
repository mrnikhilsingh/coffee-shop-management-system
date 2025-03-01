<?php
// Load environment variables
$env = parse_ini_file('.env');

// Define the database server name, username, password, and database name
$server_name = $env['DB_HOST'];
$user_name = $env['DB_USER'];
$password = $env['DB_PASS'];
$db_name = $env['DB_NAME'];

// Create a new connection to the MySQL database
$conn = mysqli_connect($server_name, $user_name, $password, $db_name);

// Check if the connection was successful
if (!$conn) {
    // If the connection failed, display an error message and stop execution
    die("Connection failed: " . mysqli_connect_error());
}
