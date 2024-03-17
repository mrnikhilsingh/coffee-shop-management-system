<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (isset($_GET['id'])) {

    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM cart WHERE product_id = {$product_id} AND user_id = {$user_id}";
    mysqli_query($conn, $query) or die("Query Unsuccessful");

    echo "<script>alert('item removed')</script>";
    
    echo "<script>window.location.href = 'cart.php'</script>";
}

?>