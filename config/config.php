<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "ns_coffee";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    echo "<script>Connection Failed</script>";
}
?>