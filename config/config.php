<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "ns_coffee";

$conn = mysqli_connect($server, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    // If the connection failed, display an error message and stop execution
    die("Connection failed: " . mysqli_connect_error());
}
