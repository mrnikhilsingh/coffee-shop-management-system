<?php require_once "../includes/header.php"; ?>

<?php

// if user logged in trying to directly access delete page
// denied to access
if (!isset($_SERVER['HTTP_REFERER'])) {
    echo "<script>window.location.href = '../index.php'</script>";
    exit();
}

// if user not logged in
// denied to access delete page
if (!isset($_SESSION['user_id'])) {
    header("Location: " . url . "/index.php"); // Redirect to the home page
    exit();
}

if (isset($_GET['id'])) {

    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM cart WHERE product_id = {$product_id} AND user_id = {$user_id}";
    mysqli_query($conn, $query) or die("Query Unsuccessful");

    echo "<script>alert('item removed')</script>";

    echo "<script>window.location.href = 'cart.php'</script>";
}

?>